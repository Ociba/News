<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PhotoPurchase;
use App\Models\PhotosOnSell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PhotoPurchaseController extends Controller
{
    /**
     * Get all published photos for sale
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 12);
        
        $photos = PhotosOnSell::published()
            ->with(['section', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);

        return response()->json([
            'success' => true,
            'data' => $photos
        ]);
    }

    /**
     * Get single photo details
     */
    public function show($id)
    {
        $photo = PhotosOnSell::published()
            ->with(['section', 'user'])
            ->findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $photo
        ]);
    }

    /**
     * Initiate photo purchase
     */
    public function purchase(Request $request, $photoId)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'DEBUG: No authenticated user'
            ], 401);
        }
        
        $user = Auth::guard('api')->user();
        $photo = PhotosOnSell::published()->findOrFail($photoId);

        $validator = Validator::make($request->all(), [
            'payment_method' => 'required|in:mobile_money,bank,card',
            'phone_number' => 'required_if:payment_method,mobile_money',
            'bank_name' => 'required_if:payment_method,bank',
            'account_number' => 'required_if:payment_method,bank',
            'card_number' => 'required_if:payment_method,card',
            'card_expiry' => 'required_if:payment_method,card',
            'card_cvc' => 'required_if:payment_method,card',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // In a real app, you would process payment here
        // For demo, we'll just create a purchase record

        $purchase = PhotoPurchase::create([
            'photo_id' => $photo->id,
            'buyer_id' => $user->id,
            'amount' => $photo->price,
            'payment_method' => $request->payment_method,
            'status' => 'completed', // In real app, this would be pending until payment confirmation
            'download_expires_at' => now()->addDays(30),
            'license_agreement' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Purchase successful',
            'data' => [
                'purchase' => $purchase,
                'download_url' => route('api.photos.download', $photo->id)
            ]
        ]);
    }

    /**
     * Download purchased photo
     */
    public function download($photoId)
    {
        $user = Auth::guard('api')->user();
        $photo = PhotosOnSell::findOrFail($photoId);

        // Check if user has purchased this photo
        $purchase = PhotoPurchase::where('photo_id', $photo->id)
            ->where('buyer_id', $user->id)
            ->completed()
            ->first();

        if (!$purchase || !$purchase->isDownloadable()) {
            return response()->json([
                'success' => false,
                'message' => 'You do not have permission to download this photo or your download period has expired'
            ], 403);
        }

        // Increment download count
        $photo->incrementDownloadCount();

        // Get file path
        $filePath = 'photos/' . $photo->image_without_watermark;

        if (!Storage::exists($filePath)) {
            return response()->json([
                'success' => false,
                'message' => 'File not found'
            ], 404);
        }

        return response()->download(
            storage_path('app/' . $filePath),
            $photo->slug . '.' . pathinfo($photo->image_without_watermark, PATHINFO_EXTENSION),
            [
                'Content-Type' => 'image/' . pathinfo($photo->image_without_watermark, PATHINFO_EXTENSION)
            ]
        );
    }

    /**
     * Get user's purchased photos
     */
    public function myPurchases()
    {
        $user = Auth::guard('api')->user();
        
        $purchases = PhotoPurchase::with(['photo', 'photo.section'])
            ->where('buyer_id', $user->id)
            ->completed()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $purchases
        ]);
    }
}