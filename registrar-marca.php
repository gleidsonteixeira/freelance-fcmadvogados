<?php
    include("control/header.php");
?>

    <main>
        <link rel="stylesheet" type="text/css" href="css/servico.css" media="all"/>
        <section id="banner">
            <ul>
                <li class="active suave">
                    <figure>
                        <img src="img/banner/banner1.webp" alt="Registre-sua-marca" class="suave">
                    </figure>
                    <div class="conteudo">
                        <h1 class="condesed"><b>Registro de marca</b></h1>
                        <p>Pesquisamos e registramos sua marca, protegendo-a contra utilização indevida e garantindo a exclusividade sobre sua utilização.</p>
                        <a href="#!" class="suave">Registrar minha marca</a>
                    </div>
                    <form action="solicitar-registro.php" method="post">
                        <p class="azul-text">Preencha os campos abaixo e solicite uma pesquisa agora mesmo.</p>
                        <div class="detalhe amarelo"></div>
                        <label class="azul-text">Nome</label>
                        <input type="text" name="nome" placeholder="Digite seu nome">
                        <label class="azul-text">Email</label>
                        <input type="email" name="email" placeholder="Digite seu email">
                        <label class="azul-text">Telefone</label>
                        <input type="tel" name="telefone" class="telefone" placeholder="Ex: (00) 0000-0000">
                        <label class="azul-text">Marca</label>
                        <input type="text" name="marca" placeholder="Nome da sua marca">
                        <label class="azul-text">Área de atuação</label>
                        <input type="text" name="ramo" placeholder="Qual o ramo da sua empresa">
                        <button type="submit" class="click suave">Solicitar pesquisa</button>
                    </form>
                </li>
            </ul>
        </section>
        <section id="etapas">
            <h2 class="azul-text"><b>É simples, prático e seguro!</b></h2>
            <ul class="numeros">
                <li class="suave">
                    <h1 class="suave condesed">1°</h1>
                    <p>Contato para o envio das informações necessárias;</p>
                </li>
                <li class="suave">
                    <h1 class="suave condesed">2°</h1>
                    <p>Verificamos a viabilidade do nome e logo;</p>
                </li>
                <li class="suave">
                    <h1 class="suave condesed">3°</h1>
                    <p>Pagamento das taxas mais serviço;</p>
                </li>
                <li class="suave">
                    <h1 class="suave condesed">4°</h1>
                    <p>Efetuamos o pedido e acompanhamos até a concessão do Certificado de Registro.</p>
                </li>
            </ul>
        </section>
        <section id="beneficios">
            <h2 class="condesed"><b>O registro de sua marca garante, entre outros benefícios:</b></h2>
            <ul>
                <li>
                    <figure>
                        <img src="img/exclusividade.webp" alt="Exclusividade">
                    </figure>
                    <h4 class="condesed azul-escuro-text"><b>Exclusividade</b></h4>
                    <div class="detalhe"></div>
                    <p>O certificado de registro de marca garante exclusividade do nome por pelo menos 10 anos.</p>
                </li>
                <li>
                    <figure>
                        <img src="img/credibilidade.webp" alt="Credibilidade">
                    </figure>
                    <h4 class="condesed azul-escuro-text"><b>Credibilidade</b></h4>
                    <div class="detalhe"></div>
                    <p>Seus clientes e consumidores sentirão mais confiança no seu produto ou serviço.</p>
                </li>
                <li>
                    <figure>
                        <img src="img/valores.webp" alt="Valor">
                    </figure>
                    <h4 class="condesed azul-escuro-text"><b>Valor</b></h4>
                    <div class="detalhe"></div>
                    <p>A marca registrada permite o franqueamento e o licenciamento, gerando lucro.</p>
                </li>
            </ul>
            <a id="registrarmarca" class="suave click">Registrar minha marca</a>
        </section>
        <section id="faq">
            <ul>
                <li><h4 class="azul-text"><b>Dúvidas Frequentes</b></h4></li>
                <li data-ativo="1" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>O que é o registro de marca?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>Marca é todo sinal distintivo, visualmente perceptível, que identifica e distingue produtos e serviços, bem como certifica a conformidade dos mesmos com determinadas normas ou especificações técnicas. A marca registrada garante ao seu proprietário o direito de uso exclusivo no território nacional em seu ramo de atividade econômica. Ao mesmo tempo, sua percepção pelo consumidor pode resultar em agregação de valor aos produtos ou serviços.</p>
                </li>
                <li data-ativo="0" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>Por que é preciso registrar a sua marca?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>É muito comum que os empreendedores, ao iniciarem seu negócio, se preocupe com vários fatores, como abertura do CNPJ, locação do estabelecimento, criação do site, das redes sociais, etc., mas esqueça de registrar a sua marca.</p>
                    <p>Altos investimentos no produto e na publicidade da marca para criar uma identidade e fortalecer a imagem da empresa são feitos. No entanto, tudo isso pode ser posto a perder sem o registro da marca.</p>
                    <p>Isso porque se um terceiro pode registrar a mesma marca que você utiliza, até mesmo com menos tempo de atividade comercial, e impedir que você continue utilizando a sua marca.</p>
                    <p>Isso é possível?! Sim! O INPI garante ao titular da marca a exclusividade do uso da marca por dez anos. E a pessoa que primeiro fizer a solicitação é quem receberá o registro da marca, independente de quanto tempo a atividade comercial é exercida.</p>
                    <p>Ou seja, o registro da marca, antes ou simultaneamente aos demais investimentos deve ser prioritário, pois, é a melhor estratégia para proteger sua criação e seu negócio, evitando a concorrência desleal e fortalecendo a imagem da sua empresa ou do seu negócio.</p>
                </li>
                <li data-ativo="0" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>O que é registrável como marca?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>A marca pode ser conferida para um produto ou para um serviço, contanto que tenha poder de distingui-lo de outros semelhantes ou afins. São registráveis como marca sinais visuais. Portanto, a lei brasileira não protege os sinais sonoros, gustativos e olfativos.</p>
                </li>
                <li data-ativo="0" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>Quais são os direitos e deveres do titular de uma marca?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>A marca registrada garante a propriedade e o uso exclusivo em todo o território nacional por dez anos. O titular deve mantê-la em uso e prorrogá-la de dez em dez anos.</p>
                </li>
                <li data-ativo="0" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>Quando ocorre a perda do direito?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>O registro da marca extingue-se pela expiração do prazo de vigência; pela renúncia (abandono voluntário do titular ou pelo representante legal); pela caducidade (falta de uso da marca) ou pela inobservância do disposto no art. 217 da Lei de Propriedade Industrial.</p>
                </li>
                <li data-ativo="0" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>Minha empresa já tem o nome aprovado na Junta Comercial do meu Estado. Ainda preciso registrar a marca?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>Sim. Registro do nome empresarial não é a mesma coisa que registro da marca. A Junta Comercial é o órgão do governo responsável por fazer o cadastro público do negócio. Com esse cadastro, naquele estado não será possível nova empresa com a mesma razão social. Esse procedimento, no entanto, não garante a propriedade sobre a marca. Uma empresa concorrente pode criar um produto ou serviço e nomeá-los com o mesmo nome da sua marca não registrada, por exemplo.</p>
                </li>
                <li data-ativo="0" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>Já existe outra empresa com o nome da marca que pretendo utilizar ou já utilizo. Posso registrar mesmo assim?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>É possível registrar marcas idênticas, desde que pertençam a atividades comerciais diferentes. Na perspectiva do consumidor, não haverá confusão entre uma marca de calçados e outra de alimento, por exemplo. A exceção fica por conta das chamadas “marcas de alto renome”. Nesse caso, os elementos não podem ser copiados em nenhum segmento, porque excedem os limites formais de seus mercados. É o caso de McDonald’s e Adidas, por exemplo.</p>
                </li>
                <li data-ativo="0" class="bordered click">
                    <h5 class="condesed azul-escuro-text"><b>Por que contratar o FCM Advogados?<i class="material-icons">keyboard_arrow_down</i></b></h5>
                    <div class="detalhe"></div>
                    <p>Realizamos busca prévia e análise completa, antes de efetuar o pedido de registro da marca, para verificar se já existe marca anteriormente depositada ou registrada. Isso evita que nosso cliente desperdice dinheiro e garanta o resultado da concessão do registro pretendido.</p>
                    <p>Depois da busca feita e verificação da probabilidade de concessão do registro, nos responsabilizamos por efetuar o pedido e acompanhá-lo até o termo final, defendendo sempre o direito do nosso cliente a conseguir o registro, com manifestações contra terceiros, impugnações e recursos necessários.</p>
                    <p>Informamos aos clientes, no último ano de vigência de sua marca já registrada, o prazo final da concessão para verificação do interesse de pedido de renovação.</p>
                    <p>Realizamos periodicamente buscas do uso indevido da marca ou afins por terceiros, protocolando pedidos de oposição, garantindo assim a exclusividade do uso da marca registrada para nosso cliente.</p>
                </li>
            </ul>
        </section>
        <section id="portfolio">
            <h2 class="condesed azul-text"><b>Empresas que confiam em nosso trabalho</b></h2>
            <ul>
                <li>
                    <a target="_blank" href="http://www.adpec.org.br/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/adpec.webp" alt="Associação dos Defensores Públicos do Estado do Ceará – ADPEC" title="Associação dos Defensores Públicos do Estado do Ceará – ADPEC" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://cursoselect.com.br/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/curso-select.webp" alt="Curso Select Ltda" title="Curso Select Ltda" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://saxum.com.br/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/saxum.webp" alt="Saxum Demolições Pavimentações e Escavações Ltda" title="Saxum Demolições Pavimentações e Escavações Ltda" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.jdspaisagismo.com/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/jds-paisagismo.webp" alt="JDS Paisagismo e Construções Ltda" title="JDS Paisagismo e Construções Ltda" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.paraclito.com.br/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/paraclito-engenharia.webp" alt="Paráclito Engenharia Ltda" title="Paráclito Engenharia Ltda" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.facebook.com/pages/Construtora-Barreto-Cab%C3%B3/175775859195047" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/construtora-barreto-cabo.webp" alt="Construtora Barreto Cabó Ltda" title="Construtora Barreto Cabó Ltda" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.viramar.com.br/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/viramar-shopping-center.webp" alt="Viramar Shopping Center" title="Viramar Shopping Center" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.instagram.com/vemproiska/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/restaurante-iska.webp" alt="Restaurante Iskä" title="Restaurante Iskä" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.instagram.com/vesselenergia/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/vessel-energia.webp" alt="Vessel Energia" title="Vessel Energia" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.instagram.com/omarmenino/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/o-mar-menino.webp" alt="Restaurante O Mar Menino" title="Restaurante O Mar Menino" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://www.facebook.com/pensartgestao" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/pensart.webp" alt="Pensart Gestão e Produção Cultural Ltda" title="Pensart Gestão e Produção Cultural Ltda" class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="https://institutosherpa.com.br/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/instituto-sherpa.webp" alt="Instituto Sherpa Psicologia e Desenvolvimento Humano Ltda." title="Instituto Sherpa Psicologia e Desenvolvimento Humano Ltda." class="suave">
                        </figure>
                    </a>
                </li>
                <li>
                    <a target="_blank" href="http://www.sinergiamedica.com.br/" class="mini-title upper suave">
                        <figure>
                            <img src="img/clientes/sinergia-medica.webp" alt="Sinergia Médica Comércio de Artigos Médicos e Ortopédicos Ltda" title="Sinergia Médica Comércio de Artigos Médicos e Ortopédicos Ltda" class="suave">
                        </figure>
                    </a>
                </li>
                
            </ul>
            <div class="depoimento">
                <p><em>"O FCM Advogados resolveu uma causa trabalhista contra a nossa empresa com conhecimentos técnicos, atenção e solicitude. Não deixou nada a desejar e por isso, recomendo a sua contratação"</em></p>
                <h5 class="condesed azul-text"><b>Rodrigo Cabó</b></h5>
                <h6 class="mini-title upper azul-escuro-text">Sócio Restaurante Iskä</h6>
            </div>
            <div class="depoimento">
                <p><em>“O escritório nos ajudou na reestruturação de contratos trabalhistas e de prestadores de serviços com eficiência e comprometimento. Estudam o caso a fundo e pesquisam as possibilidades, se dedicando a resolver o problema e sanar todas as dúvidas”</em></p>
                <h5 class="condesed azul-text"><b>Soraia Libório</b></h5>
                <h6 class="mini-title upper azul-escuro-text">Sócia Fisiokids Fisioterapia</h6>
            </div>
        </section>
    </main>
    
    <script src="js/zepto.js" type="application/javascript"></script>

    <?php
        include("control/footer.php");
    ?>

    <script>
        function faq(){
            $("#faq li").click(function(){
                var a = $(this).attr("data-ativo");
                if(a == 0){
                    $("#faq li").attr("data-ativo",0);
                    $("#faq li p").hide("fast");
                    $(this).find("p").show("fast");
                    $(this).attr("data-ativo",1);
                }else{
                    $(this).find("p").hide("fast");
                    $(this).attr("data-ativo",0);
                }
            });
        }faq();
        $("#portfolio ul li").height($("#portfolio ul li").width());
        document.getElementById("registrarmarca").addEventListener('click', () => {
            scrollTo(document.getElementById("banner"));
        });
    </script>
    

</body>
</html>