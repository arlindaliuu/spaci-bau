document.addEventListener("DOMContentLoaded", function(){
    window.addEventListener('scroll', function() {
        const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        const scrollHeight = document.documentElement.scrollHeight || document.body.scrollHeight;
        const clientHeight = document.documentElement.clientHeight || document.body.clientHeight;
        const scrolled = scrollTop / (scrollHeight - clientHeight) * 100;
        document.getElementById('progress-bar').style.width = scrolled + '%';
    });
});