<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
$(function() {
    <?php if (isset($_SESSION['message'])) { ?>
    Swal.fire({
        icon: '<?= $_SESSION['message_type'] ?>',
        title: '<?= $_SESSION['message'] ?>',
        showConfirmButton: false,
        timer: 2000
    });
    <?php echo "console.log('Mensagem exibida!');"; ?>
    <?php } ?>
});
</script>
<?php if (isset($_SESSION['message'])): ?>
<div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
    <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php unset($_SESSION['message']); endif; ?>
</body>

</html>