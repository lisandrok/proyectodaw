<?php // Este archivo debe incluirse antes del cierre de la etiqueta body en todas las paginas ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script>
        //Agregamos padding en forma dinamica a cualquier div con la clase contenido para evitar que el footer flotante lo tape
        document.addEventListener('DOMContentLoaded', function() {
            function ajustarPaddingDelContenido() {
                let footer = document.querySelector('.footer');
                let contenido = document.querySelector('.contenido');
                let alturaFooter = footer.offsetHeight;
                contenido.style.paddingBottom = alturaFooter + 'px';
            }

            // Ajustar pading al inicio
            ajustarPaddingDelContenido();

            // Ajustar padding al haber un cambio en el tamano de la ventana
            window.addEventListener('resize', ajustarPaddingDelContenido);
        });
        </script>