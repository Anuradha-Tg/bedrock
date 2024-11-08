<?php

namespace App\Http\Controllers\Userpanel;

use App\Models\Country;
use App\Models\Postion;
use App\Models\VesselType;
use App\Helpers\LogActivity;
use Illuminate\Http\Request;
use App\Models\CandidateGeneral;
use Illuminate\Support\Facades\DB;
use App\Helpers\APIResponseMessage;
use App\Http\Controllers\Controller;
use App\Models\CandidateFamilyDetails;
use App\Models\CandidateSeaExperience;
use App\Models\CandidateChildrenDetail;
use App\Models\CandidateMedicalHistory;
use App\Models\CandidatePersonalDetail;
use App\Models\CandidatePreSeaTraining;
use App\Models\CandidatePersonalDocument;
use App\Models\CandidateSurgicalOperations;
use App\Models\CandidateIllnessesorAccidents;
use App\Models\License;
use App\Models\LicenseType;
use Carbon\Carbon;

class RecruiterFormController extends Controller
{
   /**
     * Controller method for displaying the recruiter form view.
     */
    public function index()
    {
        // dd('test2');
        $postions = Postion::where('is_active',"Y")->get();
        $countries = Country::orderBy('country_name')->get();
        $vesselTypes = VesselType::all();

        $licence_section_license = LicenseType::where('section_type', 1)->where('section', 0)->where('status', 'Y')->orderBy('display_order', 'ASC')->get();
        $licence_section_regv1 = LicenseType::where('section_type', 1)->where('section', 1)->where('status', 'Y')->orderBy('display_order', 'ASC')->get();
        $licence_section_regvi1 = LicenseType::where('section_type', 2)->where('section', 5)->where('status', 'Y')->orderBy('display_order', 'ASC')->get();
        $licence_section_regvi2 = LicenseType::where('section_type', 2)->where('section', 6)->where('status', 'Y')->orderBy('display_order', 'ASC')->get();
        $licence_section_otherm = LicenseType::where('section_type', 3)->where('status', 'Y')->orderBy('display_order', 'ASC')->get();

        // dd($licence_section_license);

        return view('userpanel.recruiter.recruiterform',compact('postions','countries','vesselTypes','licence_section_license','licence_section_regv1',
            'licence_section_regvi1','licence_section_regvi2','licence_section_otherm'));
    }

       /*
        Summary: This PHP code defines a function in the RecruitersController class to handle the storing of recruiter data from a form submission.
        @param Request $request: The request object containing the form data
    */
    public function store(Request $request)
    {
        $request->validate([
            //personal details
            // 'title' => 'required',
            // 'surname' => 'required',
            // 'otherNames' => 'required',
            // 'nationality' => 'required',
            // 'dob' => 'required',
            // 'placeOfBirth' => 'required',
            // 'maritalStatus' => 'required',
            // 'gender' => 'required',
            // 'religion' => 'required',
            // 'rankApplied' => 'required',
            // 'availableDate' => 'required',
            // 'primaryAddress' => 'required',
            // 'city' => 'required',
            // 'country' => 'required',
            // 'homeTel' => 'required',
            // 'mobileNo' => 'required',
            // 'fax' => 'required',
            // 'email' => 'required',
            // 'collarSize' => 'required',
            // 'chestSize' => 'required',
            // 'waistSize' => 'required',
            // 'insideLegSize' => 'required',
            // 'capSize' => 'required',
            // 'overallSize' => 'required',
            // 'safetyShoeSize' => 'required',
            // 'height' => 'required',
            // 'weight' => 'required',
            // 'bmi' => 'required',

            // //personal documents
            // 'seamanCountryofIssue' => 'required',
            // 'seamanNumber' => 'required',
            // 'seamanDateofIssue' => 'required',
            // 'seamanIssuedAt' => 'required',
            // 'seamanValidUntil' => 'required',
            // 'passportCountryofIssue' => 'required',
            // 'passportNumber' => 'required',
            // 'passportDateofIssue' => 'required',
            // 'passportIssuedAt' => 'required',
            // 'passportValidUntil' => 'required',

            // //seafarer family detailes
            // 'nFullName' => 'required',
            // 'nRelationShip' => 'required',
            // 'nGender' => 'required',
            // 'nAddress' => 'required',
            // 'ncity' => 'required',
            // 'nCountry' => 'required',
            // 'nMobile' => 'required',

        ]);

        try {
            DB::beginTransaction();


            // $imgName = null;
            // if ($request->file) {
            //     $imageExtension = $request->file->extension();
            //     $replace = str_replace(' ', '-', strtolower($request->surname));
            //     $imgName = $replace . '.' . $imageExtension;
            //     $uploadUrl = (new StorageHelper('candidateImage', $imgName, $request->file))->uploadImage();
            // }

            if (!$request->file('file') == "") {

                $letterhead = $request->file('file')->getClientOriginalName();

                $path = $request->file('file')->store('public/candidateImage');

            } else {
                $path = "";
            }

            $personalDetails = new  CandidatePersonalDetail();
            $personalDetails->title = $request->title;
            $personalDetails->surname = $request->surname;
            $personalDetails->other_name = $request->otherNames;
            $personalDetails->nationality = $request->nationality;
            $personalDetails->dob = $request->dob;
            $personalDetails->image = $path;
            $personalDetails->city_of_birth = $request->placeOfBirth;
            $personalDetails->marital_status = $request->maritalStatus;
            $personalDetails->gender = $request->gender;
            $personalDetails->religion = $request->religion;
            $personalDetails->rank_applied = $request->rankApplied;
            $personalDetails->available_date = $request->availableDate;
            $personalDetails->primary_permanent_address = $request->primaryAddress;
            $personalDetails->city = $request->city;
            $personalDetails->country_id = $request->country;
            $personalDetails->home_number = $request->homeTel;
            $personalDetails->mobile_number = $request->mobileNo;
            $personalDetails->fax = $request->fax;
            $personalDetails->email = $request->email;
            $personalDetails->collar_size = $request->collarSize;
            $personalDetails->chest_size = $request->chestSize;
            $personalDetails->waist_size = $request->waistSize;
            $personalDetails->inside_leg_size = $request->insideLegSize;
            $personalDetails->cap_size = $request->capSize;
            $personalDetails->overall_size = $request->overallSize;
            $personalDetails->safety_shoe_size = $request->safetyShoeSize;
            $personalDetails->height = $request->height;
            $personalDetails->weight = $request->weight;
            $personalDetails->bmi = $request->bmi;
            $personalDetails->is_willing_to_approve = $request->is_wiiling_to_approve;
            $personalDetails->status = 0;
            $personalDetails->add_from = "O";
            if ($request->hasFile('seafarer_cv')) {

                $letterhead = $request->file('seafarer_cv')->getClientOriginalName();

                $path = $request->file('seafarer_cv')->store('public/seafarerfiles');

                $personalDetails->seafarer_cv = $path;
            }
            $personalDetails->is_status = "Y";
            $personalDetails->is_delete = 0;
            $personalDetails->form_complete_status = 2;
            if(isset($request->mobileNo)) {
                $personalDetails->save();
            }

            $personalDocument = new  CandidatePersonalDocument();
            $personalDocument->personal_details_id = $personalDetails->id;
            $personalDocument->seaman_country_issue = $request->seamanCountryofIssue;
            $personalDocument->seaman_number = $request->seamanNumber;
            $personalDocument->seaman_date_of_issue = $request->seamanDateofIssue;
            $personalDocument->seaman_issued_at = $request->seamanIssuedAt;
            $personalDocument->seaman_valid_unit = $request->seamanValidUntil;
            $personalDocument->passport_country_issue = $request->passportCountryofIssue;
            $personalDocument->passport_number = $request->passportNumber;
            $personalDocument->passport_date_of_issue = $request->passportDateofIssue;
            $personalDocument->passport_issued_at = $request->passportIssuedAt;
            $personalDocument->passport_valid_unit = $request->passportValidUntil;
            $personalDocument->us_visa_country_issue = $request->usvisaCountryofIssue;
            $personalDocument->us_visa_number = $request->usvisaNumber;
            $personalDocument->us_visa_date_of_issue = $request->usvisaDateofIssue;
            $personalDocument->us_visa_issued_at = $request->usvisaIssuedAt;
            $personalDocument->us_visa_valid_unit = $request->usvisaValidUntil;
            $personalDocument->yellow_fever_country_issue = $request->yellowFeverCountryofIssue;
            $personalDocument->yellow_fever_number = $request->yellowFeverNumber;
            $personalDocument->yellow_fever_date_of_issue = $request->yellowFeverDateofIssue;
            $personalDocument->yellow_fever_issued_at = $request->yellowFeverIssuedAt;
            $personalDocument->yellow_fever_valid_unit = $request->yellowFeverValidUntil;
            $personalDocument->is_valid_yf_lifetime = $request->is_valid_yf_lifetime;
            $personalDocument->national_id_fever_country_issue = $request->nationalIdNountryofIssue;
            $personalDocument->national_id_fever_number = $request->nationalIdNumber;
            $personalDocument->national_id_fever_date_of_issue = $request->nationalIdDateofIssue;
            $personalDocument->national_id_fever_issued_at = $request->nationalIdIssuedAt;
            $personalDocument->national_id_fever_valid_unit = $request->nationalIdValidUntil;
            if(isset($request->seamanNumber)) {
                $personalDocument->save();
            }

            $familyDetails = new  CandidateFamilyDetails();
            $familyDetails->personal_details_id = $personalDetails->id;
            $familyDetails->full_name = $request->nFullName;
            $familyDetails->relationship = $request->nRelationShip;
            $familyDetails->is_select_gender = $request->nGender;
            $familyDetails->nationality = $request->nNationality;
            $familyDetails->address = $request->nAddress;
            $familyDetails->city = $request->ncity;
            $familyDetails->country_id = $request->nCountry;
            $familyDetails->email = $request->nEmail;
            $familyDetails->telephone_number = $request->nTel;
            $familyDetails->phone_number = $request->nMobile;
            $familyDetails->father_first_name = $request->nFatherName;
            $familyDetails->father_last_name = $request->nLastName;
            $familyDetails->father_dob = $request->nFatherDob;
            $familyDetails->father_passport_no = $request->nFatherPassportNo;
            $familyDetails->father_issued_date = $request->nFastherIssueDate;
            $familyDetails->father_place_of_issue = $request->nFatherPlaceIssue;
            $familyDetails->father_valid_until_date = $request->nFatherValidUntill;
            $familyDetails->mother_first_name = $request->nMotherName;
            $familyDetails->mother_last_name = $request->nMotherLastName;
            $familyDetails->mother_dob = $request->nMotherDob;
            $familyDetails->mother_passport_no = $request->nMotherPassportNo;
            $familyDetails->mother_issued_date = $request->nMotherIssueDate;
            $familyDetails->mother_place_of_issue = $request->nMotherPlaceIssue;
            $familyDetails->mother_valid_until_date = $request->nMotherValidUntill;
            $familyDetails->spouse_first_name = $request->nSposeFirstName;
            $familyDetails->spouse_last_name = $request->nSposeLastName;
            $familyDetails->spouse_dob = $request->nSposeDob;
            $familyDetails->spouse_passport_no = $request->nSposePassportNo;
            $familyDetails->spouse_issued_date = $request->nSposeIssuedDate;
            $familyDetails->spouse_place_of_issue = $request->nSposePlaceIssue;
            $familyDetails->spouse_valid_until_date = $request->nSposeValidUntill;
            if(isset($request->nFullName) && isset($personalDetails->id)) {
                $familyDetails->save();
            }

            // dd($request->nChildrenFirstName);

            // dd($request->nChildGender);

            if(isset($request->nChildrenFirstName[0]) && count($request->nChildrenFirstName) > 0  ){
                
                // $test = count($request->nChildrenFirstName);
                // dd($test);

                $childrenCount = count($request->nChildrenFirstName) - 1;

                // dd($childrenCount);

                // dd($request->chilGender);
                $c = 1;
                for($i = 0; $i < $childrenCount; $i++) {

                    $childgender = $c.'nChildGender';

                    $childrenDetail = new  CandidateChildrenDetail();
                    $childrenDetail->personal_details_id =$personalDetails->id;
                    $childrenDetail->children_first_name = $request->nChildrenFirstName[$i];
                    $childrenDetail->children_last_name = $request->nChildrenLastName[$i];
                    $childrenDetail->children_dob = $request->nChildrenDob[$i];
                    // $childrenDetail->child_gender = 0; //$request->chilGender[$i]
                    $childrenDetail->child_gender = $request->$childgender[0];
                    $childrenDetail->children_passport_no = $request->nChildrenPassportNo[$i];
                    $childrenDetail->children_issued_date = $request->nChildrenIssuedDate[$i];
                    $childrenDetail->children_place_of_issue = $request->nChildrenPlaceIssue[$i];
                    $childrenDetail->children_valid_until_date = $request->nChildrenValidUntill[$i];
                    $childrenDetail->save();

                    $c++;
                }

            }

            if( isset($request->qPreSeaCertificateNo[0]) && count($request->qPreSeaCertificateNo) > 0 ){

                $preSeaCertificateCount = count($request->qPreSeaCertificateNo) - 1;

                for($i = 0; $i < $preSeaCertificateCount; $i++) {

                    $preSeaTraining = new  CandidatePreSeaTraining();
                    $preSeaTraining->persenal_details_id =  $personalDetails->id;
                    $preSeaTraining->certificate_no = $request->qPreSeaCertificateNo[$i];
                    $preSeaTraining->qualification = $request->qPreSeaTrainingqualification[$i];
                    $preSeaTraining->training_institute = $request->qPreSeaTrainingTrainitInstitue[$i];
                    $preSeaTraining->from = $request->qPreSeaTrainingFrom[$i];
                    $preSeaTraining->to = $request->qPreSeaTrainingTo[$i];
                    $preSeaTraining->save();
                }

            }

            // dd($request->type_grade_class_certificate_course_1);
            // dd($request->license_type_id_1);

            if(!empty($request->license_type_id_1[0]) && $request->license_type_id_1[0] != null) {

                $licenseCount = count($request->license_type_id_1) - 1;

                for($i=0; $i < $licenseCount; $i++) {
                    $stcwCertificates = new License();
                    $stcwCertificates->recruiter_id =  $personalDetails->id;
                    $stcwCertificates->license_type_id = $request->license_type_id_1[$i];
                    $stcwCertificates->type_grade_class_certificate_course = $request->type_grade_class_certificate_course_1[$i];
                    $stcwCertificates->country_id = $request->country_id_1[$i];
                    $stcwCertificates->number = $request->number_1[$i];
                    $stcwCertificates->issue_date = $request->issue_date_1[$i];
                    $stcwCertificates->expiry_date = $request->expiry_date_1[$i];
                    $stcwCertificates->issuing_authority = $request->issuing_authority_1[$i];
                    $stcwCertificates->form_section = 1;
                    $stcwCertificates->save();
                }
            }


            // dd('hd');

            //STCW - 4.2 REG V/1

            // dd(count($request->license_type_id_2));
            if(!empty($request->license_type_id_2[0]) && $request->license_type_id_2[0] != null) {

                // dd($request->license_type_id_2);

                $licenseCount = count($request->license_type_id_2) - 1;

                for($i=0; $i < $licenseCount; $i++) {
                    $stcwCertificates = new License();
                    $stcwCertificates->recruiter_id =  $personalDetails->id;
                    $stcwCertificates->license_type_id = $request->license_type_id_2[$i];
                    $stcwCertificates->type_grade_class_certificate_course = $request->type_grade_class_certificate_course_2[$i];
                    $stcwCertificates->country_id = $request->country_id_2[$i];
                    $stcwCertificates->number = $request->number_2[$i];
                    $stcwCertificates->issue_date = $request->issue_date_2[$i];
                    $stcwCertificates->expiry_date = $request->expiry_date_2[$i];
                    $stcwCertificates->issuing_authority = $request->issuing_authority_2[$i];
                    $stcwCertificates->form_section = 2;
                    $stcwCertificates->save();
                }
            }

            //STCW - 4.3 REG VI/1

            if(!empty($request->license_type_id_3[0]) && $request->license_type_id_3[0] != null) {

                // dd($request->license_type_id_3);

                $licenseCount = count($request->license_type_id_3) - 1;

                // dd($request->issue_date_3);

                for($i=0; $i < $licenseCount; $i++) {
                    $stcwCertificates = new License();
                    $stcwCertificates->recruiter_id =  $personalDetails->id;
                    $stcwCertificates->license_type_id = $request->license_type_id_3[$i];
                    $stcwCertificates->country_id = $request->country_id_3[$i];
                    $stcwCertificates->number = $request->number_3[$i];
                    $stcwCertificates->issue_date = $request->issue_date_3[$i];
                    $stcwCertificates->expiry_date = $request->expiry_date_3[$i];
                    $stcwCertificates->issuing_authority = $request->issuing_authority_3[$i];
                    $stcwCertificates->form_section = 3;
                    $stcwCertificates->save();
                }
            }

            //STCW - 4.3 REG VI/2

            if(!empty($request->license_type_id_4[0]) && $request->license_type_id_4[0] != null) {

                // dd($request->license_type_id_4[2]);

                $licenseCount = count($request->license_type_id_4) - 1;

                for($i=0; $i < $licenseCount; $i++) {
                    $stcwCertificates = new License();
                    $stcwCertificates->recruiter_id =  $personalDetails->id;
                    $stcwCertificates->license_type_id = $request->license_type_id_4[$i];
                    $stcwCertificates->country_id = $request->country_id_4[$i];
                    $stcwCertificates->number = $request->number_4[$i];
                    $stcwCertificates->issue_date = $request->issue_date_4[$i];
                    $stcwCertificates->expiry_date = $request->expiry_date_4[$i];
                    $stcwCertificates->issuing_authority = $request->issuing_authority_4[$i];
                    $stcwCertificates->form_section = 4;
                    $stcwCertificates->save();
                }
            }

            //STCW - 4.4

            if(!empty($request->license_type_id_5[0]) && $request->license_type_id_5[0] != null) {

                // dd($request->license_type_id_5[2]);

                $licenseCount = count($request->license_type_id_5) - 1;

                for($i=0; $i < $licenseCount; $i++) {
                    $stcwCertificates = new License();
                    $stcwCertificates->recruiter_id =  $personalDetails->id;
                    $stcwCertificates->license_type_id = $request->license_type_id_5[$i];
                    $stcwCertificates->country_id = $request->country_id_5[$i];
                    $stcwCertificates->number = $request->number_5[$i];
                    $stcwCertificates->issue_date = $request->issue_date_5[$i];
                    $stcwCertificates->expiry_date = $request->expiry_date_5[$i];
                    $stcwCertificates->issuing_authority = $request->issuing_authority_5[$i];
                    $stcwCertificates->form_section = 5;
                    $stcwCertificates->save();
                }
            }


            if(!empty($request->sCompanyManningAgent[0]) && $request->sCompanyManningAgent[0] != null) {

                $seaexpCount = count($request->sCompanyManningAgent) - 1;

                for($i = 0; $i < $seaexpCount; $i++) {
                    $seaExperience = new  CandidateSeaExperience();
                    $seaExperience->persenal_details_id = $personalDetails->id;
                    $seaExperience->company_name = $request->sCompanyManningAgent[$i];
                    $seaExperience->flag = $request->sFlag[$i];
                    $seaExperience->vessel_name = $request->sVesselName[$i];
                    $seaExperience->imo_no = $request->sIMONo[$i];
                    $seaExperience->vessel_type_id = $request->vesselTypeId[$i];
                    $seaExperience->teu = $request->teu[$i];
                    $seaExperience->grt = $request->sGrt[$i];
                    $seaExperience->dwt = $request->sdwt[$i];
                    $seaExperience->engine_make = $request->sEngineMake[$i];
                    $seaExperience->bhp = $request->sBhp[$i];
                    $seaExperience->rank = $request->sRank[$i];
                    $seaExperience->date_from = $request->sDatefrom[$i];
                    $seaExperience->date_to = $request->sDateTo[$i];
                    $seaExperience->year = $request->sYear[$i];
                    $seaExperience->month = $request->sMonth[$i];
                    $seaExperience->date = $request->sDate[$i];
                    $seaExperience->sign_of_reasone = $request->sSignOffReason[$i];
                    $seaExperience->sign_off_description = $request->sign_off_description[$i];
                    $seaExperience->save();
                }
            }

            // $supportingDocument = null;
            // if ($request->file) {
            //     $imageExtension = $request->sSupportingDocuments->extension();
            //     $replace = str_replace(' ', '-', date('m-d-Y_H-i-s'));
            //     $supportingDocument = $replace . '.' . $imageExtension;
            //     $uploadUrl = (new StorageHelper('Candidatemedicalhistoryfiles', $supportingDocument, $request->sSupportingDocuments))->uploadImage();
            // }


            $medicalHistory = new  CandidateMedicalHistory();
            $medicalHistory->persenal_details_id = $personalDetails->id;
            $medicalHistory->blood_type_id = $request->bloodTypeId;
            $medicalHistory->is_medical_reason = $request->midicalRadio;
            $medicalHistory->vessel_name = $request->sNameofVessl;
            $medicalHistory->date_of_occurrence = $request->sDateofOccurrence;
            $medicalHistory->place_of_occurrence = $request->sPlaceofOccurrence;
            if (!$request->file('sSupportingDocuments') == "") {

                $letterhead = $request->file('sSupportingDocuments')->getClientOriginalName();

                $path = $request->file('sSupportingDocuments')->store('public/candidatemedicalhistoryfiles');

                $medicalHistory->supporting_document = $path;

            }
            $medicalHistory->brief_description = $request->sBriefDescription;
            $medicalHistory->health_or_disability_description = $request->sHealthOrDisability;
            $medicalHistory->is_surgical_operations = $request->bmidicalRadio;
            if(isset($personalDetails->id)) {
                $medicalHistory->save();
            }

            if(!empty($request->sDetailsofOperationsQuestionB[0]) && $request->sDetailsofOperationsQuestionB[0] != null) {

                $surgicalOprCount = count($request->sDetailsofOperationsQuestionB) - 1;

                for($i = 0; $i < $surgicalOprCount; $i++) {

                    $surgicalOperation = new  CandidateSurgicalOperations();
                    $surgicalOperation->persenal_details_id = $personalDetails->id;
                    $surgicalOperation->surgical_detail_of_operation = $request->sDetailsofOperationsQuestionB[$i];
                    $surgicalOperation->surgical_date = $request->sDateofOccurrenceQuestionB[$i];
                    $surgicalOperation->surgical_period_of_disability = $request->sPeriodofdisabilityQuestionB[$i];
                    $surgicalOperation->surgical_present_condition = $request->sPresentConditionQuestionB[$i];
                    // $surgicalOperation->created_by = Auth::id();

                    $surgicalOperation->save();
                }
            }

            if(!empty($request->sDetailsofillnessQuestionC[0]) && $request->sDetailsofillnessQuestionC[0] != null) {

                $illnessorAccidentCount = count($request->sDetailsofillnessQuestionC) - 1;

                for($i = 0; $i < $illnessorAccidentCount; $i++) {

                    $illnessesorAccidents = new  CandidateIllnessesorAccidents();
                    $illnessesorAccidents->persenal_details_id = $personalDetails->id;
                    $illnessesorAccidents->illnessesor_details_of_illness = $request->sDetailsofillnessQuestionC[$i];
                    $illnessesorAccidents->illnessesor_date = $request->sDateQuestionC[$i];
                    $illnessesorAccidents->illnessesor_therapy = $request->sTherapyQuestionC[$i];
                    // $illnessesorAccidents->created_by = Auth::id();

                    $illnessesorAccidents->save();
                }
            }

            // $generalFile = null;
            // if ($request->gfile) {
            //     $imageExtension = $request->gfile->extension();
            //     $replace = str_replace(' ', '-', date('m-d-Y_H-i-s'));
            //     $generalFile = $replace . '.' . $imageExtension;
            //     $uploadUrl = (new StorageHelper('generalfile', $generalFile, $request->gfile))->uploadImage();
            // }

            $currentDate = Carbon::now()->toDateString();

            $candidateGeneral = new  CandidateGeneral();
            $candidateGeneral->persenal_details_id = $personalDetails->id;
            $candidateGeneral->is_denied_foreign_visa = $request->GgeneralQuestionA;
            $candidateGeneral->is_subject_of_a_court_enquiry = $request->GgeneralQuestionB;
            $candidateGeneral->country_id = $request->gCountry;
            $candidateGeneral->reason = $request->gReason;
            if (!$request->file('gfile') == "") {

                $letterhead = $request->file('gfile')->getClientOriginalName();

                $path = $request->file('gfile')->store('public/generalfile');

                $candidateGeneral->file = $path;

            }
            $candidateGeneral->signindate = $currentDate;
            if(isset($personalDetails->id)) {
                $candidateGeneral->save();
            }




            //log activity
            LogActivity::addToLog('Personal Details New '.$personalDetails->otherNames.' added('.$personalDetails->id.').');

            DB::commit();
            return redirect()->back()->with('success', APIResponseMessage::CREATED);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
            return redirect()->back()->with('error', APIResponseMessage::ERROR_EXCEPTION);
        }

    }
}
