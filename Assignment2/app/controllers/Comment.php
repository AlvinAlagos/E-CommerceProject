<?php
    class Comment extends Controller {

        public function __construct()
        {
            $this->commentModel = $this->model('commentModel');
            
            accountCreationRedirect();
        }

        public function index(){
            header('Location: /Assignment2/Home');
        }

        public function createComment($publicationId) {
            if(!isset($_POST['createComment'])){
                $this->view('Comment/createComment');
            }
            else {
                $data = [
                    'text' => trim($_POST['text']),
                    'profile_id' => $_SESSION['profile_id'],
                    'publication_id' => $publicationId
                ];

                if ($this->commentModel->createComment($data)) {
                    echo 'Commenting...';
                    echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Publication/getPublication/'.$publicationId.'">';
                }
            }
        }

        public function editComment($commentId) {
            $comment = $this->commentModel->getComment($commentId);

            //verify if same user
            if ($comment->profile_id != $_SESSION['profile_id']) {
                echo 'Unable to access comment.';
                echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Home">';
            }
            elseif(!isset($_POST['editComment'])){
                $this->view('Comment/editComment', $comment);
            }
            else {
                $data = [
                    'comment_id' => $commentId,
                    'text' => trim($_POST['text']),
                    'timestamp' => $comment->timestamp,
                    'profile_id' => $_SESSION['profile_id'],
                    'publication_id' => $comment->publication_id
                ];

                if ($this->commentModel->editComment($data)) {
                    echo 'Editing Comment...';
                    echo '<meta http-equiv="Refresh" content="2; url=/Assignment2/Publication/getPublication/'.$comment->publication_id.'">';
                }
            }
        }

        public function deleteComment($commentId) {
            if ($this->commentModel->deleteComment($commentId)) {
                echo '<meta http-equiv="Refresh" content="0.5; url=/Assignment2/Profile">';
            }
        }
    }
?>