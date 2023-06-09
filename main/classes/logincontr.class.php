<?php
class logincontr extends login
{
    private $user_id;
    private $password;

    public function __construct($user_id, $password)
    {
        $this->user_id = $user_id;
        $this->password = $password;
    }

    public function loginUser()
    {
        $this->getUser($this->user_id, $this->password);
        if ($_SESSION['user_type'] == 1) {
            header('location: /LIBRARY_ARCHIVING_SYSTEM2/main/admin/article_manage.admin.php?error=none');
        } elseif ($_SESSION['user_type'] == 2 || $_SESSION['user_type'] == 3) {
            $student = new studentview;
            $result = $student->showStudent($_SESSION['user_id']);
            if ($result['status_title'] == 'Active') {
                header('location: ../student/article.student.php?error=none');
            } elseif ($result['status_title'] == 'Restricted') {
                header('location: ../restricted.php?error=none');
            }
        }
    }
}
