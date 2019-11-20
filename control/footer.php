<footer>
    <div class="conteudo">
        <div class="pombo">
            <figure>
                <img src="img/logo-fcm-advogados-azul.webp" alt="Logo FCM Advogados">
            </figure>
            <p>Com sede na cidade de fortaleza/CE, Fernandes Coelho Maia Advogados é formado por três sócios que, de forma interdisciplinar e integrada, se empenham em buscar soluções jurídicas para os mais diiversos problemas nas variadas áreas do direito pessoal e empresarial, sempre tendo em mente os valores que os fizeram se unir: Honestidade, Dedicação e Qualidade do serviço prestado.</p>
            <a target="_blank" href="https://www.facebook.com/PomboCriativo/" class="suave addBannerClick" data-id="8" data-tipo="CTT" target="_blank"><img src="https://pombocriativo.com/img/ico6.webp" alt="icone-facebook"></a>
            <a target="_blank" href="https://www.instagram.com/pombocriativo/?hl=pt-br" class="suave addBannerClick" data-id="10" data-tipo="CTT" target="_blank"><img src="https://pombocriativo.com/img/ico8.webp" alt="icone-instagram"></a>
            <a target="_blank" href="https://api.whatsapp.com/send?phone=5585987974616&amp;text=Olá%20Pombo%20Criativo,%20gostaria%20de%20solicitar%20um%20orçamento...&amp;l=pt-br" class="suave rede-social addBannerClick" data-id="11" data-tipo="CTT"><img src="https://pombocriativo.com/img/ico9.webp" alt="icone-whatsapp"></a>
            <a target="_blank" href="https://www.youtube.com/channel/UCKEsrPEIsH5ZvESF2hcZezg" class="suave addBannerClick" data-id="9" data-tipo="CTT" target="_blank"><img src="https://pombocriativo.com/img/ico7.webp" alt="icone-youtube"></a>
        </div>
        <div class="infos">
            <div class="sitacao">
                <h1 class="azul-text"><em>"A essência dos Direitos Humanos<br> é o direito a ter direitos."</em></h1>
                <h5>Hannah Arendt</h5>
            </div>
            <ul>
                <li class="title condesed azul-text">A FCM Advogados</li>
                <li class="mini-title upper"><a href="#!">Registrar minha marca</a></li>
                <li class="mini-title upper"><a href="#!">Quem somos</a></li>
                <li class="mini-title upper"><a href="#!">Soluções</a></li>
                <li class="mini-title upper"><a href="#!">Blog</a></li>
            </ul>    
            <ul>
                <li class="title condesed azul-text">Escritório</li>
                <li class="mini-title upper">Rua Coronel Linhares, 950</li>
                <li class="mini-title upper">Sala 1008, Aldeota</li>
                <li class="mini-title upper">Fortaleza - CE</li>
            </ul>
            <ul>
                <li class="title condesed azul-text">Contatos</li>
                <li class="mini-title upper"><a href="mailto:contato@fcmadvogados.adv.br" class="addBannerClick" data-id="7" data-tipo="CTT">contato@fcmadvogados.adv.br</a></li>
                <li class="mini-title upper">
                    <a href="tel:8531818341" class="addBannerClick" data-id="6" data-tipo="CTT">(85) 3181-8341</a> | <a href="tel:85988894027" class="addBannerClick" data-id="6" data-tipo="CTT">(85)98889-4027</a>
                </li>
            </ul>
        </div>
        <h6 class="rodape">
            &copy 2018-<?php echo date('Y');?> Todos os direitos reservados a <span class="azul-text">FCM Advogados</span><br>
            Mantido e desenvolvido por <a target="_blank" href="https://www.pombocriativo.com/"><span class="amarelo-text">Pombo Criativo</span></a>
        </h6>
    </div>
</footer>
<a href="#topo" class="voltar suave click"><i class="material-icons">arrow_forward</i></a>
<script>
    $(document).ready(function(){
        voltar();
    });
    $(window).scroll(function(){
        voltar();
    });
    function menu(){
        $(".mini-menu").click(function(){
            $(".menu, .sombra").toggleClass("active");
            $(this).toggleClass("active");
        });
        $(".sombra").click(function(){
            $(".menu, .mini-menu, .sombra").toggleClass("active");
        });
    } menu();
    function voltar(){
        var a = pageYOffset;
        if(a > 700){
            $(".voltar").addClass("active");
        }else{
            $(".voltar").removeClass("active");
        }
        if(a > 1000){
            $("#redes-sociais").css({"left":"-40px"});
        }else{
            $("#redes-sociais").css({"left":"30px"});
        }
    }
</script>
