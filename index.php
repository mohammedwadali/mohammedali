<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=strip_tags(trim($_POST['name']));
    $email=filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $student_id=strip_tags(trim($_POST['student-id']));
    $year=strip_tags(trim($_POST['year']));
    $batch=strip_tags(trim($_POST['batch']));
    //sure everyone fields are full and in makes no difference
    if(!empty($name)&& !empty($email)&& !empty($student_id)&& !empty($year)&& !empty($batch)){
    $student-data=[
        'name'=>$name,
        'email'=>$email,
        'student-id'=>$student-id,
        'year'=>$year,
        'batch'=>$batch];
    }

$json_data=json_encode($student_data,json-unescaped-unicode)."\n";
$file='student.text';
file_put_contents($file,$json_data,FILE_APPEND | LOCK_EX);
//automatically redirect to the form page after submission
header("Location: index.php");
exit();
}
else{
    echo "Please fill in all the fields.";
}
}
   
else{
    //protect the file from direct access without submitting the form
    header("Location: index.php");
    exit();
}
?>
