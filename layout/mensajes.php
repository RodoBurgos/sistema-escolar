<!--Mensajes generales-->
<?php
    if((isset($_SESSION['mensaje'])) && (isset($_SESSION['icono'])))
    {
        $mensaje = $_SESSION['mensaje'];
        $icono = $_SESSION['icono'];
?>
        <script>
            Swal.fire({
            position: "top-end",
            icon: '<?php echo $icono;?>',
            title: '<?php echo $mensaje;?>',
            showConfirmButton: false,
            timer: 4000
            });
        </script>

<?php
        //Borrar una sola sesión
        unset($_SESSION['mensaje']);
        unset($_SESSION['icono']);
    }
?>