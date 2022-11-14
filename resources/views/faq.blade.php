@extends('layouts.app')

@section('title', 'Services')

@section('content')

<div class="container-fluid bg-light-green shadow" id="title_container">
    <div class="container">
        <div class="header pb-2 pt-3">
            <h2 class="text-white">FAQ</h2>
        </div>
   </div>
</div>

<div class="container mb-5 mt-4" >
    <div class="row new_content ">
        <div class="col-lg-12 col-md-12 col-12 order-1 ">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                       <b class="c-text-yellow">Q</b>: How do students avail of the services of a student assistant?
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="">
                            <b class="c-text-green">Answer</b>: The student assistants are provided based on individual student profiles of needs that are submitted to districts for approval.

                            Schools submit individual student applications to district offices.

                            Districts assign student assistant hours to schools based on the number of students approved, the severity of the needs and the school’s special education teacher allocation.

                            Student assistants are provided to school districts to support teachers in meeting the physical, personal care and behaviour management needs of students with severe needs.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <b class="c-text-yellow">Q</b>: What is the difference between student affairs and student services?
                    </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="">
                            <b class="c-text-green">Answer</b>:
                            These names are often interchangeable. Typically, though, student affairs offices emphasize student learning and development by providing tutors, mentors, and career services. Student services offices, by contrast, may focus more on providing support to remove personal, physical, and financial barriers to help learners reach their academic goals.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <b class="c-text-yellow">Q</b>: Accordion Item #3 What services can college students get for free?
                    </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p class="">
                            <b class="c-text-green">Answer</b>:
                            College students can usually access counseling and mental health services at no charge. Students also can receive academic and career services from tutors, advisors, mentors, and workshops.
                        </p>
                    </div>
                  </div>
                </div>
            </div>

            <br>

            <div class="text-center mt-5">
                <strong class="fs-2">Can't Find Answers ?</strong>
                <p class="fs-3">You can contact us directly here in our website</p>
            </div>
       </div>
    </div>
</div>

@endsection

