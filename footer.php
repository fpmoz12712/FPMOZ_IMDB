
   <script>

        let landPage = document.querySelector('.landing-page');

        document.addEventListener('click',e=>{

            if(e.target.id === 'registracija'){
                window.location = 'registration.php' 
            }else if(e.target.id === 'prijava'){
                window.location = 'index.php'
            }
        })
</script>

</body>
</html>