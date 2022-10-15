@extends('admin.layout.layout')
@section('main_content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">SETTINGS</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Jobs</a></li>
                                <li class="breadcrumb-item active">Settings</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="{{ Route('manage_account') }}" class="">
                                <div class="card overflow-hidden card-animate ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-account-circle-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Manage Account</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{ Route('manage_users') }}" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-account-circle-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Manage Users</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="roles-list.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-profile-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Role</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="nortification.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class=" ri-information-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Nortification</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="refer_earn.php" class="">
                                <div class="card overflow-hidden card-animate ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class=" ri-share-forward-box-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Refer & Earn</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="questionnaire.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-chat-3-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Communication</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="questionnaire.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class=" ri-bill-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Billing</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="job-settings.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-user-settings-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Job Settings</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="workflow.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class=" ri-bar-chart-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>WorkFlow</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="setting-questionnaire.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class=" ri-question-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>Questionnaires</b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="setting-scorecard.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-star-half-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b> Score Card </b></h5>
                                        </div>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="disqualify-reasons.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-bookmark-2-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b> Disqualify Reasons </b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="email-template.php" class="">
                                <div class="card overflow-hidden card-animate  ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class=" ri-mail-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b> Email Template </b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="sms-template.php" class="">
                                <div class="card overflow-hidden card-animate ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-smartphone-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b>SMS Template</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="careers-portal.php" class="">
                                <div class="card overflow-hidden card-animate ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-briefcase-4-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b> Careers Portal</b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="integration.php" class="">
                                <div class="card overflow-hidden card-animate ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class=" ri-dribbble-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b> Integration </b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="config-tracker.php" class="">
                                <div class="card overflow-hidden card-animate ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-file-excel-2-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b> Configure Tracker </b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3">
                            <a href="config-factsheet.php" class="">
                                <div class="card overflow-hidden card-animate ">
                                    <div class="card-body bg-marketplace p-1">
                                        <div class="avatar-sm mx-auto mb-3 mt-2">
                                            <span class="avatar-title bg-soft-info rounded fs-3 ">
                                                <i class="ri-file-word-2-line text-info"></i>
                                            </span>
                                        </div>
                                        <div class="text-center">
                                            <h5 class="fs-12 text-muted"><b> Configure Factsheet </b></h5>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
@endsection
