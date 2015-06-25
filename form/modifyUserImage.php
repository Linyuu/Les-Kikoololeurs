if(isset($_FILES['image_profile']) AND $_FILES['image_profile']['error'] == 0){

if($_FILES['image_profile']['size'] <= 5000000){
$file_infos = pathinfo($_FILES['image_profile']['name']);
$filename = $_FILES['image_profile']['name'];
$extension_origin = $file_infos['extension'];
$valid_extensions = array('jpg', 'jpeg', 'png', 'gif');

if(in_array($extension_origin, $valid_extensions)){
$req = $pdo->prepare('UPDATE users SET image_profile=:filename WHERE id='.$id.'');
$req->execute(array(
'filename'=>$filename
));

move_uploaded_file($_FILES['image_profile']['tmp_name'], 'images/uploads/' . basename($_FILES['image_profile']['name']));