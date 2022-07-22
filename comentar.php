<form action="sendEmail.php" method="post" id="form-comentario">
    <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email'])?$_POST['email']:''; ?>">
    <input type="text" name="subject" placeholder="Assunto" value="<?php echo isset($_POST['subject'])?$_POST['subject']:''; ?>" />
    <textarea type="text" name="message" placeholder="Comentario"><?php echo isset($_POST['message'])?$_POST['message']:''; ?></textarea>
    <input type="submit" name="comentar" value="Comentar" />

    <b><?php echo isset($_POST['message'])? $_POST['message'] : "";?></b>
</form>