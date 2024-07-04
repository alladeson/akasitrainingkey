@extends('front.layouts.global')

@section('title', 'Contact')

@section('third_party_stylesheets')
    <style>

    </style>
@endsection

@section('main')
    <div class="hero-arera course-item-height" data-background="{{ asset_own('front/img/slider/course-slider.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-course-1-text">
                        <h2>{{ __('Testimonies') }}</h2>
                    </div>
                    <div class="course-title-breadcrumb">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('contact.key2') }}</a></li>
                                <li class="breadcrumb-item"><span>{{ __('Testimonies') }}</span></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->


    <!-- contact-area-start -->
    <div class="contact-area pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/Image.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Guillaume Z.</h4>
                                <span>Team Manager</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key81') }}</h3>
                            <p>
                                Before following the program organise by Akasi Institute of Technologies, I hesitated much
                                to follow a traning. Today, I feel confortable and serene in my role of digital project
                                manager. I will be visiting their website regularly to detect new program which could assist
                                me in improving my daily works.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial-02.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Marguerite O.</h4>
                                <span>Marketing Director</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key83') }}</h3>
                            <p>
                                Excellent! That corresponded exactly what I expected. Many techniques and “tricks” to
                                improve the speech (at the same time effectiveness and the management of the stress). It is
                                very practical, with many individualized advices. Very good formation. Very good dynamics of
                                the small group, very varied methods, put rhythm into, connected well well. The presenter
                                takes well into account the function and the context of work of each one to illustrate for
                                examples and to imply everyone. The constant link with the professional practice was very
                                enriching.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Marcelin A.</h4>
                                <span>Entrepreneur</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key85') }}</h3>
                            <p>
                                Excellent! That corresponded exactly what I waited for. Many techniques and “tricks” to
                                improve the speech (at the same time effectiveness and the management of the stress). It is
                                very practical, with many individualized advices. The practical exercises made it possible
                                to personalize this traning, to individualize the advices, and thus to make it possible each
                                one to find that which it needed to progress.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Yves c.</h4>
                                <span>Technician in Data Processing</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key81') }}</h3>
                            <p>
                                Formation very interesting and enriching. New knowledge which will make it possible to
                                improve the various assumptions of responsibility in my professional practice. Dynamic and
                                very interesting speaker.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Jean-Marie D.</h4>
                                <span>Politician</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key83') }}</h3>
                            <p>
                                Formidable! This internship was the opportunity to put flat and to clear up a certain number
                                of ideas, of fears which I had and with final to answer the question of how I could better
                                express me in public, and with less apprehensions. Very great professionalism of the trainer
                                who is anxious to make take part each participant. It quickly analyzed the weak points of
                                each one to show us how we could improve.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Arielle G.</h4>
                                <span>Project Coordinator</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key85') }}</h3>
                            <p>
                                I appreciated much the formation, it is for me a grace to have followed this formation to
                                the beginning of my new mission of coordinator. She brought one to me more on the manner of
                                directing a team (methods, means, theory and practical). I would have wished that all my
                                team profit from it. Achieved goals.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Angello M.</h4>
                                <span>Program Manager/Politician</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key83') }}</h3>
                            <p>
                                I appreciated this formation much because the formative one took well account of my needs
                                and my difficulties and as the formation was nourished concrete examples which I lived, it
                                was very pleasant and useful. This formation thus exceeded the framework of the “simple”
                                speech in public.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Nicole N.</h4>
                                <span>Bank Manager</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key85') }}</h3>
                            <p>
                                I benefit from this e-mail to renew you my thanks for this experiment of animation that you
                                allowed me to live. I “burst myself” and I hope to have the opportunity of renewing this
                                extraordinary adventure… Thank you still.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
                    <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
                </div> --}}
                            <div class="testimonial-title">
                                <h4>Yacouba H.</h4>
                                <span>Webmaster</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key81') }}</h3>
                            <p>
                                I sincerely thank you for the support and the new lesson brought has my professional career.
                                I set out again satisfied, equipped and especially very glad to have made your knowledge. I
                                appreciated your company well during these two weeks. Receive my sincere thanks and
                                greetings.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
                    <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
                </div> --}}
                            <div class="testimonial-title">
                                <h4>Ib'n SAKA SALE</h4>
                                <span>Technician in Data Processing</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key85') }}</h3>
                            <p>
                                I was particularly interested by the problems networks like going up and dismounting a
                                central processing unit. The data-processing formation of maintenance brought more
                                confidence to me in me when I make maintenance for my entourage or myself. I could acquire
                                much knowledge. It is one very very good formation, it answered all my waitings. I will
                                recommend it.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Jacques-Phillipes K.</h4>
                                <span>IS Manager</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key83') }}</h3>
                            <p>
                                Interesting program, in direct link with the practice. Catch of retreat on the professional
                                practice with new working tracks. Trainer extremely pedagogue with a capacity of
                                dedramatisation.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Isidor S.O.</h4>
                                <span>Entrpreneur</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key81') }}</h3>
                            <p>
                                Internship excel. I appreciated the attitude of the presenter putting naturally in practice
                                what he explains theoretically. I appreciated work much on the delegation, the motivation,
                                the change. And manner of leading the internship: no dead time, use of different supports,
                                variety of the exercises, all that was very pleasant.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Yob Noelly</h4>
                                <span>Webmaster</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key85') }}</h3>
                            <p>
                                It is a very good formation, very enriching. That helped me much to take the hand on a
                                machine linux as an administrator. I would advise with others to make it. I was particularly
                                interested by the talks, the explanations and the practice. My goals were achieved
                                perfectly.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Jean Claude M.</h4>
                                <span>Manager</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key83') }}</h3>
                            <p>
                                Perfect, good and excellent tarning, professor worthy of his function with a quite
                                comprehensible methodology (synthetic). I will not hesitate a moment to recommend it to
                                somebody. This formation brought to me competences of the universe of the Digital economy
                                and its large in games to embrace the commercial universe.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Jean-Claude B.</h4>
                                <span>Project Manager</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key81') }}</h3>
                            <p>
                                The evaluation occurred very well. All lets me think that my brother appreciated really this
                                morning, him who likes so much to be stimulated. I lived myself a beautiful experiment; Mr.
                                HOUDAGBA was accessible and over very professional. It is really its routine. He knows what
                                he speaks. Thank you
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>ISSA Kone</h4>
                                <span>Data Analyst</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key85') }}</h3>
                            <p>
                                The explanations of the trainer were very clear and quite illustrated. I will strongly
                                recommend this formation, moreover this week, I did not stop saying of it good near my
                                entourage and I also will do it in my company.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Gauthier I.</h4>
                                <span>Project Coordinator</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key81') }}</h3>
                            <p>
                                The formation was very good from the contents and the service of formative which I found of
                                very top quality. I say thank you because there is a module which worried me but that I did
                                not wait in the formation and I was very impressed by the shape and the funds of this module
                                which I regard as a no-claims bonus of Akasi Institute of Technologiesauxséminaristes. I am
                                ready to return for other formations and the advisor to other collaborators. The approach
                                practised here is very convivial. Thank you once again.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Salamath I.</h4>
                                <span>Team Manager</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key83') }}</h3>
                            <p>
                                The training in commercial management enabled me to forget certain bad reflexes to acquire a
                                more effective methodology and much more tools in productive management of my sales force.
                                Today, I feel confortable to communicate effectively on the social networks
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Bernard Y.</h4>
                                <span>Sales Ingenieer</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key85') }}</h3>
                            <p>
                                This formation brought a better comprehension and new competences of the E-commerce one to
                                me. It is a good formation and I strongly recommend it. One year ago, I did not know
                                anything in creation Web site. But after having followed the formations: creation of
                                website, PHP and E-commerce I could create my Web site of A to Z with different the
                                extensions E-commerce, RSS feed,… Thank you with all the AITainsi team that with the trainer
                                who was very professional and very attentive with my waitings.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mb-20">
                    <div class="testimonial-items position-relative">
                        <div class="testimonial-header">
                            {{-- <div class="testimonial-img">
             <img src="{{ asset_own('front/img/testimonial/testimonial.png') }}" alt="image not found">
          </div> --}}
                            <div class="testimonial-title">
                                <h4>Imath-Adouni L.</h4>
                                <span>Technician in Data Processing</span>
                            </div>
                        </div>
                        <div class="testimoni-quotes">
                            <img src="{{ asset_own('front/img/testimonial/quotes.png') }}" alt="image not found">
                        </div>
                        <div class="testimonial-body">
                            <h3>{{ __('home.key81') }}</h3>
                            <p>
                                Very interesting traning. We practise the communication every day, in a spontaneous and
                                intuitive way. Therefore, it is understood how it functions, which occurs in the relations,
                                how one could avoid full with problems (for oneself and work), of misunderstandings, of
                                irritation. Contrary to much other programs I assisted in the pasrt, from tomorrow I will
                                put in practice the take away, on daily basis.
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('third_party_scripts')
    <script></script>
@endsection
