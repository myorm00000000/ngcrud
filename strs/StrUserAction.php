<?php
$str_user_action="<?php
include 'autoload.php';
ini_set('display_errors',false);

\$user = new \\model\\User();
\$userDAO = new \\DAO\\UserDAO();

switch(\$_POST['action']){
	
	case 'create': // you can use any description for your cases... this is an exemple;
		\$user->setFirstName(\$_POST['firstName']);
		\$user->setLastname(\$_POST['lastName']);
		\$user->setEmail(\$_POST['email']);
		\$user->setActive(true);

		try{
				\$userDAO->create(\$user); //the 'create' method is a default in the AbstractDAO class;
				echo 'true';
			}catch(Exception \$ex){
				echo \$ex->getMessage();
			}
		break;

	case 'update':
		\$user->setId(\$_POST['id']);
		\$user->setFirstName(\$_POST['firstName']);
		\$user->setLastname(\$_POST['lastName']);
		\$user->setEmail(\$_POST['email']);
		\$user->setActive(true);

		try{
				\$userDAO->update(\$user); //the 'update' method is a default in the AbstractDAO class;
				echo 'true';
			}catch(Exception \$ex){
				echo \$ex->getMessage();
			}
		break;

	case 'delete':
		try{
				\$userDAO->delete(\$_POST['id']); //the 'delete' method is a default in the AbstractDAO class;
				echo 'true';
			}catch(Exception \$ex){
				echo \$ex->getMessage();
			}
		break;

	case 'get':
		try{
				\$user = \$userDAO->find(\$_POST['id'])->toArray(); //'find' AND 'toArray' is a default in the AbstractDAO;
				echo json_encode(\$user);
			}catch(Exception \$ex){
				echo \$ex->getMessage();
			}
		break;
	case 'list':
		try{
				\$filters['active'] = true;
				\$array = \$userDAO->get(\$filters);

				foreach(\$array as \$item){
					\$list[] = \$item->toArray();
				}
				echo json_encode(\$list);
			}catch(Exception \$ex){
				\$msg = \$ex->getMessage();
				if(preg_match(\"/doesn't exist/i\", \$msg)){
					echo \"Table wasn't created yet\";
				} else {
					echo \$msg;
				}
			}
		break;
}
";