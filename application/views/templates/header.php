<head>

	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.12.0/css/mdb.min.css">

	<!-- CSS -->
	<link id="pagestyle" rel="stylesheet" href="<?php echo base_url('application/css/DarkStyle.css'); ?>">

	<!-- libraries -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- my scripts -->
	<script src="<?php echo base_url('application/scripts/ChangeTheme.js'); ?>"></script>

</head>

<?php
// load appropriate scripts depending on page type:
switch ($page) {
	case "chat_server" :
		$chatSource = base_url("application/scripts/chat.js");
		$downloadChat = base_url("application/scripts/DownloadChat.js");
		$chatRooms = base_url("application/scripts/ChatRooms.js");
		echo <<<_END
				<script src=$chatSource></script>
				<script src=$downloadChat></script>
				<script src=$chatRooms></script>
_END;
		break;
	case "review":
		$jumpToComments = base_url("application/scripts/JumpToComments.js");
		$loadComments = base_url("application/scripts/CommentsVue.js");
		echo <<<_END
			<script src=$jumpToComments></script>
			<script src=$loadComments></script>
_END;
		break;
	default :
		break;
}
?>
<!-- nav bar -->
<nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark bg-dark" id="navbar">
	<span class="navbar-brand">1CKW50</span>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
	        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link rounded" href='<?php echo base_url(); ?>'>Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link rounded" href='<?php echo base_url("ChatServer"); ?>'>Chat server <span class="sr-only">(current)</span></a>
			</li>
		</ul>

        <?php
        // display appropriate buttons depending on whether user is logged in or not
        if (isset($_SESSION['loggedIn'])) {
            if ($_SESSION['loggedIn']) {
                echo "<a class='nav-link rounded' href='" . base_url() . "SignOut'>Sign-out (" . $_SESSION['loggedInUsername'] . ") <span class='sr-only'>(current)</span></a>";
            } else {
                echo "<a class='nav-link rounded' href='" . base_url() . "SignUp'>Sign-up <span class='sr-only'>(current)</span></a>";

                echo "<a class='nav-link rounded' href='" . base_url() . "Sign-in'>Sign-in <span class='sr-only'>(current)</span></a>";
            }
        } else {
            echo "<a class='nav-link rounded' href='" . base_url() . "SignUp'>Sign-up <span class='sr-only'>(current)</span></a>";

            echo "<a class='nav-link rounded' href='" . base_url() . "SignIn'>Sign-in <span class='sr-only'>(current)</span></a>";
        }
        ?>

        <!-- display change theme button -->
        <div id="changeThemeContainer">
            <button class="btn btn-outline-success my-2 my-sm-0" type="button" name="theme" id="changeThemeButton">Change theme</button>
        </div>

    </div>
</nav>
