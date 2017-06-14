<?php
error_reporting(E_ERROR);

########################################MAIN CONSTANTS##########################################
define("PATH_ABSOLUTE_CLASSES","/Applications/XAMPP/xamppfiles/htdocs/ei-asset/support_files/classes/");
//define("PATH_ABSOLUTE_CLASSES_NEW","/home/webserver/public_html/classes/");
//define("PATH_ABSOLUTE_CLASSES_NW","/home/webserver/public_html/classes/");
//define("PATH_ABSOLUTE_CLASSES","../classes/");
//define("PATH_HOME","/home/webserver/public_html/");

define("CONNECTION",1);
define('DACONNECTION',7);
//define("CONNECTION",6); // For live
define("CURRENT_TEST_EDITION","F");
define("CURRENT_YEAR","2007");

// Path /lsa/uploadedfiles/ for uploading assessment data in csv format
define("UPLOADEDFILES","uploadedfiles/");
//define("DOMAIN","www.educationalinitiatives.com");
define("DOMAIN","test.educationalinitiatives.com");

// Bhutan CTS - Constants
define("PATH_CHILDRENPHOTOS","images/childrenphotos/");
define("BHUTANDATABASE","educatio_bhutan");
define("GOOGLEDATABASE","educatio_google");
define("EDUCATDATABASE","educatio_educat");
define("TORRENTDATABASE","educatio_torrent");
define("PATH_UPLOADEDTEACHER_REPORTS","uploaded_teacher_training_reports/");
########################################MAIN CONSTANTS###########################################

############Reports Constants ##################
define("PATH_REPORTIMAGES","/home/webserver/public_html/detailed_assessment/images/");
//define("PDF_LICENCEKEY","w800102-010000-123250-BKLA92-XXXU42");
define("PDF_LICENCEKEY","L800102-010500-739441-BBGW92-P9VS72");
define("PATH_STUDENTREPORT","G:/xampp/htdocs/detailed_assessment/PDF");
define("PATH_SCHOOLREPORT","G:/xampp/htdocs/detailed_assessment/PDF");
define("PATH_PDFFONT","G:/xampp/htdocs/fonts/");
define("PATH_TEMP","G:/xampp/htdocs/temp/");
define("EASY_PERFO_AVG",80); // That much % of studenjt got the answer than count it easiest question
define("DIFF_PERFO_AVG",35); // That much % of student got the answer than count it difficult question
define("MAX_TEST_YEAR",10); // No of test request allowed from one school in a year
define("MISCON_DISP_WRNG_PER",40); // Consider in display if 40% students have given wrong answer
define("STUD_IMPROVEMENT_PER",25); // If student have score less than 25% consider for improvement
define("STUD_MAX_WORST_TOPIC",2); // No of topic need to display for improvment recommendation
define("MAX_MISCON_QUE_TO_DISP",3);// Maximum misconception questions need to display
define("DA_REPORT_FAILURE_EMAIL_TO","sudhir.prajapati@ei-india.com,muntaquim@ei-india.com");
define("MIN_SUBTOPIC_PERFO",70);
define("TABLET_QUEIMAGE_MAXWIDTH",520);
define("TABLET_QUEIMAGE_MAXHEIGHT",240);
define("TABLET_OPTIMAGE_MAXWIDTH",450);
define("TABLET_OPTIMAGE_MAXHEIGHT",150);
define("PATH_IMAGES","/home/webserver/public_html/detailed_assessment/images/");
define("PATH_PDF","/home/webserver/public_html/detailed_assessment/PDF");
define("SERVER_TYPE","Local");

###### constants for mailing functionalities
define("LOWPERFOPER_STUDENT_FORMAIL",10); // if student performance is less than this constant than we need to send mail
define("LOWPERFOPER_QUESTION_FORMAIL",100); // if class performance for particular quesiton is less than this const thn we need to send mail
define("LOWPERFOPER_SECTION_FORMAIL",40); // if section performance is less than this const than we need to send mail
define("MISCONQUECOUNT_FORMAIL",3); // if misconception questions count is less than this const than we need to send mail
define("MATHS_MAILTO","sudhir.prajapati@ei-india.com");//jayasree.ts@ei-india.com
define("ENG_MAILTO","sudhir.prajapati@ei-india.com");//asmi@ei-india.com
define("SCI_MAILTO","sudhir.prajapati@ei-india.com");//meghna.kumar@ei-india.com
define("REPORT_INTIMATION_EMAILIDS","sudhir.prajapati@ei-india.com"); //vishnu@ei-india.com,aarthi.muralidharan@ei-india.com
define("SERVER_TYPE","Test");
################################################

######################### EI - NOTICE BOARD CONSTANTS ########################
define("PATH_NOTICEBOARDFILE","/home/webserver/public_html/hr_manuals/");
define("SITEURL","http://test.educationalinitiatives.com/");
##############################################################################

##### DUKE TIP ############
define("DUKE_TIP_AMOUNT","1800");
define("DUKE_TIP_AMOUNT_INTERNATIONAL","200");
define("DUKE_TIP_EMAIL",'talentsearch@ei-india.com');
define("DUKE_TIP_THIRD_PARTY_EMAIL",'savitri@sageuae.com');
##### DUKE TIP ############

// Budget System Rights //
define("BUDGET_SUPER_USERS","'sridhar','sudhir','vishnu','charisma','jaspreet','rahul','saurabh.basantani','mihir.jhaveri','venkat','ketan'");
define("BUDGET_ANALYSERS","'dharti.thaker','anuja.nair','rupande.shah'");
// Budget System Rights //

//S3 DA bucket name
define('DA_BucketName', 'detailed-assessment');
define('DA_BucketURL', 'http://detailed-assessment.s3.amazonaws.com/');
define('awsAccessKey', 'AKIAIQRRSMZDXYIUJNFA');
define('awsSecretKey', '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');

define("ATTENDANCE_SYSTEM_IP","192.168.1.58");// card attendance system : computer ip address
define('DACONNECTION',7); // DAConnection for connecting to da schema/database.

$constant_da = create_function('$a', 'return $a;');


define("COMMON_DATABASE","educatio_educat");
define("DA_DATABASE","educatio_da");


############# OFFICE ADDRESSES ##############
define("OFFICE_BANGLORE","No2.  Maruthi Towers,  2nd Floor, 9th 'B' Main Road, Ex-Chairman Layout, Banaswadi, Bangalore-560043.");
define("OFFICE_NEWDELHI","2nd Floor, Building No 16, Panchsheel Community Centre, Nr. Shahpur Jat Bus Stop August Kranti Marg Hauz Khas, New Delhi - 110017");
define("OFFICE_AHMEDABAD","A/201, Balleshwar Square, Opp. Iskon Temple, S.G. Highway, Sattelite, Ahmedabad-380015.");
define("PHONE_BANGLORE","080-49252828");
define("PHONE_NEWDELHI","011-41044952");
define("PHONE_AHMEDABAD","079-66211600");
#############################################
############# VIEW ONLY IDs for Accounts (auditors)##############
$arrAccountViewAccess = array("auditor");
$officelocation = array("Ahmedabad","Delhi","Bangalore");
define("EXTENSION_LIST_PDF","/home/webserver/public_html/deskt/");
#############################################

?>
