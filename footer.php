<style>
    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #555;
        color: white;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: none;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        font-size: 24px;
        z-index: 2000;
        transition: 0.3s;
    }

    .back-to-top:hover {
        background: #2e7d32;
    }

    footer {
        background-color: #333;
        color: #aaa;
        text-align: center;
        padding: 30px 20px;
        margin-top: 50px;
        font-size: 0.9em;
    }

    footer a {
        color: #ccc;
        text-decoration: none;
    }
</style>

<a href="#" class="back-to-top" id="topBtn">&#8593;</a>

<footer>
    <p>&copy; <?php echo date('Y'); ?> Rozs Tamás. Minden jog fenntartva.</p>
    <p>Webdesign 2026</p>
</footer>

<script>
    const topBtn = document.getElementById("topBtn");
    window.onscroll = function() {
        if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
            topBtn.style.display = "flex";
        } else {
            topBtn.style.display = "none";
        }
    };

    topBtn.addEventListener("click", function(e) {
        e.preventDefault();
        window.scrollTo({top: 0, behavior: 'smooth'});
    });
</script>