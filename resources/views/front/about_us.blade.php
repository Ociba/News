@extends('template')

@section('content')
<style>
    img.rounded-circle {
        object-fit: cover;
        height: 60px;
        width: 60px;
        border: 2px solid #f8f9fa;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .welcome-card {
        background: linear-gradient(to bottom, #f8f9fa, #ffffff);
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .editor-signature {
        border-top: 1px dashed #dee2e6;
        padding-top: 15px;
        margin-top: 15px;
    }
    .contributor-card {
        transition: transform 0.3s ease;
    }
    .contributor-card:hover {
        transform: translateY(-3px);
    }
    h2, h4, h5, h6 {
        color: #2c3e50;
        font-family: 'Georgia', serif;
    }
    .contact-info {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 6px;
    }
    .disclaimer-text {
        font-size: 0.75rem;
        line-height: 1.4;
    }
</style>

<div class="container py-5">
    <div class="row mb-5">
        <!-- Left: Image of lion -->
        <div class="col-md-5">
            <div class="h-100 overflow-hidden rounded shadow-lg">
                <img src="{{ asset('lion.webp') }}"
                    class="img-fluid w-100 h-100 object-fit-cover"
                    alt="Lion running through water">
            </div>
        </div>

        <!-- Right: Welcome Message -->
        <div class="col-md-7">
            <div class="welcome-card">
                <h2 class="fw-bold mb-4" style="color: #d35400;">You are welcome</h2>
                <div class="d-flex align-items-start mb-4">
                    <img src="{{ asset('user.webp') }}" class="rounded-circle me-3" width="60" alt="Editor photo">
                    <div>
                        <p class="mb-3" style="font-size: 1.05rem; line-height: 1.7;">
                            Yet again, we are privileged to bring to you another issue of <span class="text-primary fw-bold">Explore Africa</span>. This is the third magazine of the self-appointed tourism missionary publication. We explore Africa, the coloured people continent, with all its magnificent, spectacular and life-enhancing possibilities.
                        </p>
                        <p class="mb-3" style="font-size: 1.05rem; line-height: 1.7;">
                            In this issue, we bring you the best safari parks, a collection of the outstanding 10 attractions that offer you unmatched experience. Find out what makes each safari park distinctive from another, in a manner shaped by nature.
                        </p>
                        <p class="mb-3" style="font-size: 1.05rem; line-height: 1.7;">
                            Learn about Burundi and tell a story about the heartbeat of Africa that is full of hidden treasures for adventure seekers. Throughout the country are beautiful nature reserves, savannahs, forests, mountains, and parks that showcase the regional rich flora and fauna.
                        </p>
                        <p style="font-size: 1.05rem; line-height: 1.7;">
                            And, while the old adage claims a 'picture tells a thousand words', we bring you large visuals to enable you tell a million words about Africa, the land with spectacular sights and magnificent locations that are unique to the continent.
                        </p>
                    </div>
                </div>
                <div class="editor-signature">
                    <p class="fst-italic mb-2" style="font-size: 1.1rem; color: #7f8c8d;">Let's be proud, for our continent is blessed by nature. Enjoy reading us.</p>
                    <p class="fw-bold mb-1" style="font-size: 1.1rem;">Natty Dread Babara, <span class="fst-italic" style="color: #3498db;">Editor</span></p>
                    <p class="mb-0">Email: <a href="mailto:exploreafricanagazine@gmail.com" class="text-decoration-none" style="color: #e74c3c;">exploreafricamagazine@gmail.com</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contributors & Contact -->
    <hr class="my-5" style="border-top: 2px solid #e74c3c; opacity: 0.3;">

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="contact-info">
                <h4 class="text-uppercase fw-bold mb-4" style="color: #d35400;">Explore Africa</h4>
                <p class="mb-3"><strong>Airways House,</strong><br>
                    P.O Box 23689, Kampala, Uganda<br>
                    Tel: +256 393926783, +256 752 420471<br>
                    Email: <a href="mailto:exploreafrica@gmail.com" class="text-decoration-none">exploreafrica@gmail.com</a><br>
                    <a href="mailto:fotosource@gmail.com" class="text-decoration-none">fotosource@gmail.com</a></p>

                <h6 class="fw-bold mt-4 mb-3" style="color: #2c3e50;">Editorial Team</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><strong>Executive Editor:</strong> Natty Dread Babara</li>
                    <li class="mb-2"><strong>Sub Editor:</strong> Susan Okot</li>
                    <li class="mb-2"><strong>Design:</strong> Muhammad Tamale</li>
                    <li class="mb-2"><strong>Writers:</strong> Robert Rubongoya, Angela Akumu</li>
                    <li class="mb-2"><strong>Photography:</strong> Peter Högel, Fotosource</li>
                    <li class="mb-2"><strong>Advertising:</strong> Angella Akumu</li>
                    <li class="mb-2"><strong>Sales:</strong> Sheila Nakabito</li>
                </ul>
            </div>
        </div>

        <div class="col-md-6">
            <div class="ps-md-4">
                <h5 class="fw-bold text-uppercase mb-4" style="color: #d35400;">Our Valued Contributors</h5>
                <p class="mb-3" style="font-size: 1.05rem;">We would like to thank everybody who has helped us put this issue of Explore Magazine together and make it possible for us to make the launch. Without the help time and commitment we would never have got this far.</p>
                <p class="mb-4" style="font-size: 1.05rem;">And we are particularly grateful to all our advertisers for their support.</p>
                
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="contributor-card d-flex align-items-center p-3 rounded bg-light">
                            <img src="{{ asset('user.webp') }}" class="me-3 rounded-circle" width="50" alt="Robert">
                            <div>
                                <strong class="d-block">Robert Rubongoya</strong>
                                <small class="text-muted">Writer</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="contributor-card d-flex align-items-center p-3 rounded bg-light">
                            <img src="{{ asset('user.webp') }}" class="me-3 rounded-circle" width="50" alt="Muhammad">
                            <div>
                                <strong class="d-block">Muhammad Tamale</strong>
                                <small class="text-muted">Designer</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="contributor-card d-flex align-items-center p-3 rounded bg-light">
                            <img src="{{ asset('user.webp') }}" class="me-3 rounded-circle" width="50" alt="Susan">
                            <div>
                                <strong class="d-block">Susan Okot</strong>
                                <small class="text-muted">Sub Editor</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="contributor-card d-flex align-items-center p-3 rounded bg-light">
                            <img src="{{ asset('user.webp') }}" class="me-3 rounded-circle" width="50" alt="Aisha">
                            <div>
                                <strong class="d-block">Aisha Nakato</strong>
                                <small class="text-muted">Writer</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-top">
                    <p class="disclaimer-text text-muted mb-2">The authors and publisher declare that they have compiled this document to the best of their knowledge. However, no warranty of representation is made to the accuracy of this information. The publisher assumes no responsibility for the mistakes that may arise from the use of this document or the content therein the publication.</p>
                    <p class="disclaimer-text text-muted mb-0">© 2015 All rights reserved. An <strong>Explore Africa</strong> Production.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection