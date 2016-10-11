<?php
require 'arrays.php';
session_start();

function mask($val, $mask)
{
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}

$cpf = mask($_POST['cpf'],'###.###.###-##');
$arraydata = str_split($_SESSION['data']);
$data = $arraydata[8].$arraydata[9]."/".$arraydata[5].$arraydata[6]."/".$arraydata[0].$arraydata[1].$arraydata[2].$arraydata[3];

$id = $_GET['botao'];
$espaco = " ";
$carai = "$nomes[$id]$espaco$cpf[$id]";
$certo = "%20";
$descarai = str_replace($espaco, $certo, $carai);
$nepossivel = preg_replace('/\s+/', '', $descarai);
$t = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$nepossivel";
$questao = array();
for($i=1;$i<=63;$i++)
{
  $questao[$i] = "<img src = 'img/questions-codes/$i.svg'/>";

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Avaliação CMMG</title>

    <!-- STYLES -->
    <link href="css/reset.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">


    <!-- FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=latin-ext" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <div id="prova">
  <body>

    <!--FIRST PAGE-->
    <section id="cover" class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"> <?php echo '<img src='.$t.'>'; ?> </div>
      </header>
<!-- "img/students-codes/NOME-DO-ALUNO.png" -->
      <h1>Faculdade de Ciências Médicas de Minas Gerais</h1>
      <h2>Graduação em Medicina</h2>
      <h3>Simulado Anasem - Avaliação Seriada dos Estudantes de Medicina</h3>

      <div class="form-container">
        <table class="table form-table">
          <thead>
            <tr>
              <th width="50%">Campus</th>
              <th width="25%">Prédio</th>
              <th width="25%">Sala</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php ECHO $_SESSION['campus']; ?></td>
              <td><?php ECHO $_SESSION['predio']; ?></td>
              <td><?php ECHO $_SESSION['sala']; ?></td>
            </tr>
          </tbody>
        </table>

        <table class="table form-table">
          <thead>
            <tr>
              <th width="50%">CPF do aluno</th>
              <th width="25%">Período</th>
              <th width="25%">Data</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php ECHO $cpf; ?></td>
              <td>-</td>
              <td><?php ECHO $data; ?></td>
            </tr>
          </tbody>
        </table>

        <table class="form form-table name-table">
          <thead>
            <tr>
              <th><?php ECHO $_POST['nome']; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Assine conforme documento apresentado</td>
            </tr>
          </tfoot>
        </table>

      </div>

      <div class="instructions-container">
        <h4>Leia com atenção as instruções abaixo</h4>

        <ol class="instructions">
          <li>Verifique se sua prova contém, nas últimas páginas, o Caderno de Respostas, destinado à transcrição das respostas das questões de múltipla escolha (objetivas), das questões discursivas e do questionário de percepção da prova.</li>
          <li>Confira se este caderno contém as questões de múltipla escolha (objetivas) e as discursivas de formação específica. As questões estão assim distribuídas:
            <table class="table table-condensed table-bordered">
              <thead>
                <tr>
                  <th>Partes</th>
                  <th>Número das questões</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Formação Específica/ Objetivas</td>
                  <td>1 a 60</td>
                </tr>
                <tr>
                  <td>Formação Específica/ Discursivas</td>
                  <td>61 a 63</td>
                </tr>
              </tbody>
            </table>
          </li>
          <li>Verifique se a prova está completa e se o seu nome está correto. Caso contrário, avise imediatamente um dos responsáveis pela aplicação da prova. Você deve assinar o Caderno de Respostas no espaço próprio.</li>
          <li>Use caneta esferográfica de tinta preta, tanto para marcar as respostas das questões objetivas quanto para escrever as respostas das questões discursivas.</li>
          <li>Para as questões de múltipla escolha, marque apenas uma resposta com caneta esferográfica de tinta preta da seguinte forma:
            <table class="table table-condensed table-bordered text-center">
              <tr>
                <th>certo</th>
                <th>errado</th>
                <th>errado</th>
                <th>errado</th>
              </tr>
              <tr>
                <th><span class="gabarito-item" style="background-color: #000000"></span></th>
                <th><span class="gabarito-item" style="background-image: url(img/wrong-example-01.png)">A</span></th>
                <th><span class="gabarito-item" style="background-image: url(img/wrong-example-02.png)">A</span></th>
                <th><span class="gabarito-item" style="background-image: url(img/wrong-example-03.png)">A</span></th>
              </tr>
            </table>
          </li>
          <li>Não se comunique com os demais estudantes nem troque material com eles; não consulte material bibliográfico, cadernos ou anotações de qualquer espécie.</li>
          <li>Você terá quatro horas para responder às questões de múltipla escolha e discursivas e ao questionário de percepção da prova.</li>
          <li>Quando terminar, entregue ao aplicador ou fiscal a sua prova com o Caderno de Respostas.</li>
          <li>Atenção! Você deverá permanecer, no mínimo, por uma hora na sala de aplicação das provas.</li>
        </ol>
      </div>
      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>


    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Uma criança é levada ao serviço de Urgência após ter sofrido acidente com sua bicicleta e seu pé e tornozelo ficado preso no aro. Na avaliação clínica, constatou-se que a capacidade de realização da flexão plantar estava preservada. Diante do resultado da avaliação clínica, estão preservadas as funções dos seguintes músculos:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[1]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Fibular longo, curto e tibial posterior </li>
              <li>Semimembranoso e fibular longo</li>
              <li>Fibular longo e poplíteo</li>
              <li>Semimembranoso e tibial posterior</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Paciente é atendido no pronto socorro com dor intensa na região pélvica. Apresenta história familiar de cálculo renal, levantando a suspeita de causa semelhante para a referida dor. Foi realizado exame de imagem e observou-se imagem compatível com cálculo renal no trajeto do ureter. Reconhecendo a anatomia do sistema genitourinário, as regiões de estreitamento normais, onde o cálculo renal poderá causar obstrução são:</p>
            </div><div class="qrcode"><?php ECHO $questao[2]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>a flexura esplênica, a porção intramural da bexiga e a junção pélvica.</li>
              <li>a flexura pélvica, a junção pieloureteral e porção intramural, na parede da bexiga urinária.</li>
              <li>a junção pieloureteral, a flexura intramural e a flexura pélvica.</li>
              <li>a junção pélvica, a flexura pieloureteral e a porção endomural</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>


    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Durante atendimento na Atenção Primária, uma paciente jovem, 38 anos, é encaminhada ao especialista por apresentar dor epigástrica presente durante o último ano, localizava entre o umbigo e a extremidade inferior do esterno, intermitente, embora presente na maior parte dos dias da semana, durando entre 10 minutos e 2 horas, e não se irradiando para a parte superior do esterno nem para a região subescapular direita ou através das costas. Após atendimento especializado, foi diagnosticada como  <strong> Síndrome da dor epigástrica. </strong> Considerando o acometimento observado no trato digestório, é correto afirmar que a curvatura gástrica...</p>
            </div><div class="qrcode"><?php ECHO $questao[3]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>... menor se estende do óstio cárdico à veia pilórica, onde se localiza o orifício de entrada do estômago.</li>
              <li>... menor representa a porção do trato digestório de menor dilatação do canal alimentar.</li>
              <li>... maior está direcionada ântero-inferiormente, no quadrante superior esquerdo do abdome.</li>
              <li>... maior do estômago está na margem direita e a curvatura menor na margem esquerda.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>A estrutura do coração permite que ele sirva como um sistema de bomba transportadora que mantém o sangue circulando continuamente através dos vasos sanguíneos do corpo. <br /> Reconhecendo a anatomia do coração, é correto o que se afirma em:</p>
            </div><div class="qrcode"><?php ECHO $questao[4]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A face ântero-superior do ventrículo esquerdo é uma grande parte da face esterno-costal do coração.</li>
              <li>O epicárdio é nutrido pelas artérias coronárias e por ramos da aorta, intercostais, frênicas superiores e outras.</li>
              <li>Está localizado na cavidade torácica, estando cerca de 2/3  localizados do lado direito na linha mediana</li>
              <li>A artéria do nó sinusal pode ter origem tanto na artéria coronária direita, quanto na esquerda.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Ao frequentar a academia, um jovem realiza um de seus exercícios de maneira errada e apresenta dor na musculatura glútea. Foi avaliado pelo Neurologista que diagnosticou como lesão do nervo glúteo. A lesão deste nervo irá ocasionar nesse jovem, o déficit motor de: </p>
            </div><div class="qrcode"><?php ECHO $questao[5]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Abdução da coxa</li>
              <li>Adução da coxa</li>
              <li>Extensão da coxa</li>
              <li>Rotação lateral da coxa</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Uma mulher é adepta a uma vida saudável, regada a exercício físico e alimentação balanceada. Consome carboidratos, proteínas e gorduras em quantidades necessárias para garantir que os processos metabólicos de seu corpo aconteçam dentro dos padrões de normalidade. Considerando as vias metabólicas e os papéis específicos de cada tecido de um indivíduo, é CORRETO afirmar que:</p>
            </div><div class="qrcode"><?php ECHO $questao[6]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A degradação de glicogênio, a lipólise e a proteólise muscular são fenômenos que caracterizam o período pós-prandial, e garantem o suprimento energético aos tecidos;</li>
              <li>O cérebro não tem qualquer reserva energética e por isso, independente do estado nutricional, é necessário que haja um suprimento constante de glicose</li>
              <li>A maior parte dos carboidratos, aminoácidos e parte dos triglicerídeos obtidos pela dieta são diretamente levados ao fígado pelo sistema linfático.</li>
              <li>No tecido adiposo, quando a insulina diminuir e a de glucagon aumentar, as enzimas lipases serão inativadas, impedindo a formação de ácidos graxos e glicerol</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Paciente adulto é admitido na Unidade de Terapia Intensiva do Hospital Universitário, com sinais de distúrbio do equilíbrio ácido-base.  Foram realizadas as seguintes análises, como exames de rotina para avaliação deste paciente: gases arteriais, pH sanguíneo e PaCO2. Constatou-se acidose respiratória (HCO3 elevado) e aumento da PaCO2. O reestabelecimento da homeostase desse paciente ocorre, fisiologicamente, por mecanismos envolvendo rins e pulmões. Ao considerar o equilíbrio ácido-base, é correto afirmar que a acidose:</p>
            </div><div class="qrcode"><?php ECHO $questao[7]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>... respiratória é resultado do aumento do fluxo de oxigênio pelos pulmões e acúmulo de CO2 no sangue com formação excessiva de ácido carbônico. </li>
              <li>... metabólica se comporta da mesma forma que a acidose respiratória, com aumento da PaCO2 e do HCO3</li>
              <li>... metabólica é compensada pela hiperventilação e resulta em menor reabsorção de bicarbonato pelos rins.</li>
              <li>...respiratória tende a ser compensada com uma regulação renal, ou seja, com a eliminação de uma urina mais ácida. </li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Paciente adulto é atendido na Emergência com sintomas clássicos de infarto do miocárdio. Durante sua abordagem, é realizado o eletrocardiograma e exame de sangue com dosagem enzimática do plasma. Foi relatado pelos familiares que este paciente também é alcoólatra e já foi diagnosticado com cirrose hepática sem, entretanto, adesão a qualquer tratamento. <br />Considerando a utilidade diagnóstica da medida de enzimas plasmáticas no monitoramento de lesão ou proliferação celular, na detecção, monitoramento e progresso da doença, é CORRETO afirmar que:</p>
            </div><div class="qrcode"><?php ECHO $questao[8]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A enzima Gama-Glutamil Transpeptidade (CGT), de baixa especificidade, embora sensível para hepatopatias, está elevada em alcoólatras apenas em casos de acometimento hepático e/ou biliar.</li>
              <li>O aumento da fosfatase ácida é característico e patognomônico de alterações metabólicas ósseas no alcóolatra com acometimento hepático e/ou biliar.</li>
              <li>O aumento da ALT (alanina-aminotransferase) no plasma indica possível lesão no tecido hepático e, portanto, deverá estar elevada no caso apresentado.</li>
              <li>O diagnóstico do infarto do miocárdio é reforçado pela dosagem de creatinino-quinase (CK) na forma de isoenzima híbrida, estando diminuída na situação clínica apresentada.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Durante os Jogos Olímpicos, os atletas foram alertados para beberem água continuamente, evitando que se desidratem, e as suas consequências. Por outro lado, o excesso de hidratação (hiper-hidratação) também resulta em alterações importantes na homeostase, detectáveis clinicamente. <br /> Considerando as duas situações citadas, é CORRETO afirmar que:</p>
            </div><div class="qrcode"><?php ECHO $questao[9]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Na desidratação, o turgor está diminuído e a pressão sistólica e o pulso aumentados. </li>
              <li>Na hiper-hidratação, a pressão sistólica está normal ou aumentada, o pulso normal e há redução da consciência.</li>
              <li>Na desidratação, as membranas das mucosas estão secas, a consciência reduzida e a diurese aumentada.</li>
              <li>Na hiper-hidratação, a pressão sistólica está reduzida, as secreções do globo ocular e membranas estão normais.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Uma <strong>proteína é um conjunto de</strong> pelo menos 80 <strong>aminoácidos</strong>, sendo os conjuntos menores denominados polipeptídeos. As proteínas podem ser compostas por aminoácidos iguais ou diferentes. Na representação a seguir, é mostrada uma combinação possível de três aminoácidos - <em><strong>Glicina, Alanina e Fenilalanina</strong></em>, respectivamente:</p>


            </div><div class="qrcode"><?php ECHO $questao[10]; ?></div>
            <div class="ennunciation-img-container"> <img src="img/questao10.png"> </div>
            Analisando a representação acima, é CORRETO  afirmar que:
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>As ligações primárias entre esses aminoácidos são ligações de hidrogênio</li>
              <li>Os aminoácidos envolvidos apresentam carbono quiral em suas estruturas</li>
              <li>Os radicais presentes, nesses três aminoácidos, são todos eles alifáticos</li>
              <li>O número possível de combinações entre esses aminoácidos é igual a 6</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>O mecanismo de contração muscular conta com a participação de proteínas e íons que permitem que a fibra muscular encurte durante o movimento. Ocorre o deslizamento da <strong>actina</strong> sobre os filamentos da <strong>miosina</strong>, que conservam seus comprimentos originais. A contração uniforme de cada fibra muscular é responsabilidade do sistema de túbulos T.

            </p>
            </div><div class="qrcode"><?php ECHO $questao[11]; ?></div>
            <div class="ennunciation-img-container"> <img src="img/questao11.png"> </div>

            <p> Sobre o processo de contração muscular, a única alternativa com afirmação CORRETA é:</p>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A ligação da acetilcolina ao receptor da célula muscular promove efluxo de sódio, despolarização da célula muscular, abertura dos canais de cálcio e ligação deste íon à tropomiosina. </li>
              <li>A acetilcolina liberada pelos nervos motores penetra nas fibras musculares pelos canais iônicos de rianodina presentes na membrana sarcoplasmática, promovendo a liberação de cálcio para o sarcolema.</li>
              <li>A despolarização da fibra muscular iniciada pela ligação da acetilcolina promove sequestro de íons cálcio do sarcolema para o retículo sarcoplasmático e consequente ativação das proteínas contráteis.</li>
              <li>A contração muscular se inicia com a ligação da acetilcolina ao receptor de membrana, influxo de sódio, aberturas dos canais de cálcio no túbulo transverso e no retículo sarcoplasmático e ligação deste íon à troponina.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>O pneumotórax simples é caracterizado por um quadro em que temos a entrada de ar no espaço pleural, comprometendo a ventilação pulmonar. Tal condição promove alterações nas características da pressão pleural que, juntamente com a pressão alveolar, estão diretamente relacionadas com a expansão pulmonar. <br /> Acerca do comportamento dessas pressões numa pessoa normal, é correto afirmar que:</p>


            </div><div class="qrcode"><?php ECHO $questao[12]; ?></div>
            
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Durante a inspiração, a pressão alveolar torna-se positiva facilitando a entrada do ar.</li>
              <li>A pressão pleural fica mais negativa durante a inspiração para facilitar a entrada do ar.</li>
              <li>Ambas as pressões tornam-se negativas na expiração, para que o ar possa ser eliminado.</li>
              <li>A pressão pleural precisa ficar maior que a pressão atmosférica, para manter os pulmões insuflados.  </li>
            </ol>
          </div>
        </div><!--/.item-->

        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Na década de 1890 os cientistas estudando a glândula tireóide, observaram que a sua retirada em cães e gatos resultava na morte dos animais em poucos dias. Entretanto, o mesmo não era observado ao se conservar apenas as pequenas glândulas situadas, nestes animais, atrás da glândula maior da tireóide. A essas pequenas glândulas deu-se o nome de paratireóide. <br>Sobre o paratormônio produzido pelas paratireoides e suas funções, afirma-se que:</p>


            </div><div class="qrcode"><?php ECHO $questao[13]; ?></div>
            
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>É liberado quando ocorre diminuição de cálcio sérico, e age nos ossos, rins e intestino, promovendo o sequestro desse ion.</li>
              <li>Inibe a formação do calcitriol, resultando na perda de cálcio pelas vias excretoras.</li>
              <li>Estimula o aumento da reabsorção óssea pela ação direta nos osteoclastos, através da ligação do PTH aos receptores de membrana.</li>
              <li>Tem seu início de ação imediato nos rins e nos ossos, porém a absorção intestinal acontece apenas após 1 ou 2 dias.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">

          <div class="ennunciation-container">
            <div class="ennunciation">
          <p><div class="ennunciation-img-container"> <img src="img/questao14.png"> </div></p>
          <p>A charge faz uma alusão ao coração como responsável pelas tomadas de atitudes, em detrimento do comando feito, na realidade pelo cérebro. Reforça que a função primária desse órgão é bombear sangue. Os eventos fisiológicos observados no ciclo cardíaco permitem que essa função aconteça satisfatoriamente, e está subdividido em fases. <br />Conhecendo as fases do ciclo cardíaco, é correto afirmar que:</p></div>
            <div class="qrcode"><?php ECHO $questao[14]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A ejeção ventricular ocorre quando a pressão no ventrículo diminui a valores inferiores às pressões da aorta e artérias pulmonares, e as valvas mitral e tricúspide se abrem e ejetam sangue.</li>
              <li>O enchimento ventricular promove aumento da pressão atrial acima da pressão ventricular, provocando abertura das valvas mitral e tricúspide, e permite ao fluxo ativo de sangue para os átrios.</li>
              <li>O relaxamento isovolumétrico ocorre quando a pressão atrial diminui abaixo das pressões da aorta e pulmonares, promovendo abertura das valvas aórtica e pulmonar e fechamento das valvas mitral e tricúspide.</li>
              <li>A pressão nos ventrículos aumenta em resposta à despolarização ventricular, provocando o fechamento das valvas mitral e tricúspide, enquanto as valvas pulmonar e aórtica continuam fechadas durante toda essa fase</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
            <p><div class="ennunciation-img-container"> <img src="img/questao15.png"> </div> </p>
              <p>A charge faz uma reflexão sobre a Síndrome de Burnout, resultante da persistência de agentes estressores vinculado a situações de trabalho e resultante da constante e repetitiva <strong><em>pressão emocional</em></strong> associada com intenso envolvimento com pessoas por longos períodos de tempo. Afeta profissionais como pessoas das áreas de educação, assistência social, saúde, recursos humanos, bombeiros, policiais, advogados e jornalistas. O efeito sistêmico observado pela exposição a estes agentes estressores, é observado pela ativação do sistema nervoso autonômico simpático. <br />Assinale os efeitos fisiológicos observados na charge como resultado esperado quando ativação simpática:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[15]; ?></div>
                       
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Retenção urinária e sudorese generalizada.</li>
              <li>Aumento da frequência e diminuição da força de contração cardíacas.</li>
              <li>Broncodilatação e sudorese localizada.</li>
              <li>Constrição pupilar e aumento da motilidade e secreção digestivas.</li>
            </ol>
          </div>
        </div><!--/.item-->

        
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>No ambulatório de Aconselhamento Genético, um bebê é atendido com um distúrbio hereditário raro, no qual aparecem diversos defeitos neurológicos, hepáticos e renais, que levam à morte muito cedo, geralmente na infância. A Síndrome em questão é chamada de Cérebro-hepatorrenal, ou Síndrome de Zellweger. Seu preceptor relata que essa síndrome está associada à incapacidade de enzimas, sintetizadas nos polirribossomas livres do citosol, em realizar a beta-oxidação de ácidos graxos de cadeia longa. As organelas envolvidas na disfunção apresentada por esta síndrome são os:</p>


            </div><div class="qrcode"><?php ECHO $questao[16]; ?></div>
            
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Lisossomos</li>
              <li>Endossomos</li>
              <li>Mesossomos</li>
              <li>Peroxissomos</li>
            </ol>
          </div>
        </div><!--/.item-->

        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>A mucosa oral é caracterizada por intensa troca de suas células e substituição por novas unidades. O processo de divisão celular característico dos tecidos é denominado MITOSE. <br /> Das afirmativas abaixo, é correto o que se afirma em:</p>


            </div><div class="qrcode"><?php ECHO $questao[17]; ?></div>
            
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Para que a célula se divida, a cromatina nuclear se condensa na forma de cromossomos.</li>
              <li>Para a repartição do citoplasma em duas células-filhas, há a participação dos microtúbulos e filamentos intermediários.</li>
              <li>A desorganização dos microtúbulos do fuso mitótico não interfere na continuidade da divisão celular.</li>
              <li>Nesse processo, ocorre divisão do material genético entre duas células-filhas que foi duplicado na prófase.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Paciente do sexo feminino, 34 anos de idade, recorreu ao Serviço de Oftalmologia do Hospital Universitário com queixa de alteração na visão das cores, perda severa da acuidade visual, apresentando ao exame clínico pseudoedema papilar e tortuosidade vascular posterior. Realizou-se avaliação clínica geral, sem alterações importantes. Levantou-se a hipótese de comprometimento genético para a Neuropatia Óptica Hereditária de Leber, para a qual se realizou teste genético, com resultado positivo. O Heredograma a seguir representa o caráter familiar dessa paciente:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[18]; ?></div>
            <div class="ennunciation-img-container"> <img src="img/questao18.png"> </div>

            <p>Este distúrbio é causado por um defeito do DNA mitocondrial, possível de ser constatado, nesse Heredograma, pelo fato de:</p>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>As mulheres afetadas transmitirem a doença para filhos e filhas</li>
              <li>Não apresentar nenhum padrão de herança autossômica</li>
              <li>Homens e mulheres serem igualmente afetados</li>
              <li>Nenhum homem afetado transmitir a doença</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>O <strong>tecido epitelial</strong> é composto por células poliédricas justapostas com pouca deposição de matriz-extracelular entre elas. Devido a presença de estruturas de junção intercelular, este tipo de tecido possui uma alta adesão celular. As principais funções dos tecidos epiteliais são revestimento de superfícies internas e externas do corpo e secreção. A função de revestimento geralmente costuma estar associadas à outras funções como proteção, absorção de nutrientes e percepção de estímulos enquanto que o tecido epitelial glandular costuma-se organizar para formar estruturas especializadas chamadas glândulas. <br /> Sobre este tecido e seus tipos, é CORRETO afirmar que o <strong>Epitélio</strong>:</p>


            </div><div class="qrcode"><?php ECHO $questao[19]; ?></div>
            
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>...estratificado de transição é formado por apenas uma camada de células apoiadas na lâmina basal e que apresentam núcleos em posições variadas.</li>
              <li>...simples colunar, revestindo a boca, esôfago e pele, é formado por mais de uma camada de células, sendo que as mais superficiais são achatadas.</li>
              <li>...simples colunar é formado por mais de uma camada de células e recebe este nome, pois elas alteram sua morfologia conforme o estado funcional do órgão.</li>
              <li>...pseudoestratificado, encontrado na vesícula biliar, é formado por somente uma camada de células cilíndricas apoiadas na lâmina basal.</li>
            </ol>
          </div>
        </div><!--/.item-->

        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>A síndrome de Guillain-Barré é uma doença autoimune e tem sido noticiada no Brasil por ser supostamente desencadeada também pelo Zika vírus. Os sintomas típicos incluem perda de reflexos em braços e pernas, hipotensão ou baixo controle da pressão arterial, pode haver fraqueza ou até paralisia, dentre outros. Nessa síndrome, as células destruídas são:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[20]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Miócitos</li>
              <li>Neurônios</li>
              <li>Células de Schwann</li>
              <li>Oligodendrócitos</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>


    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p> Ao se deparar com pacientes deficientes visuais, você se impressiona com a capacidade destes em realizar a leitura dos textos codificados em Braile. Um destes pacientes lhe explica que  o alfabeto Braile leva em conta que os dedos percebem em média seis impressões táteis de uma só vez e, por esse motivo, cada letra é uma combinação de até seis pontos. As terminações nervosas da pele que permitem essa detecção são principalmente:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[21]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Vater-Paccini</li>
              <li>Meisner</li>
              <li>Krause</li>
              <li>Ruffini</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Paciente jovem se apresenta na Urgência com quadro de edema de glote, edema labial e palpebral, após ingestão de frutos do mar. O mecanismo de hipersensibilidade que este paciente está apresentando é do tipo:</p>
            </div><div class="qrcode"><?php ECHO $questao[22]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I, mediada pelas IgE, ativando mastócitos.</li>
              <li>II, mediada por IgG, complexos imunes e fagócitos.</li>
              <li>III, mediada por linfócitos T (Th1, Th2 ou Tc).</li>
              <li>IV, mediada pela IgG, fagócitos e complemento.</li>
            </ol>
          </div>
        </div><!--/.item-->


        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> A resposta imune adaptativa é a segunda linha de ação que nosso corpo tem para responder a entrada de um antígeno. Essa resposta também pode ser chamada de resposta imune adquirida ou específica. Recebe esse nome porque essa resposta é a imunidade que um indivíduo desenvolve após ter tido contato com antígeno. As células que participam da resposta imune adaptativa são:</p>
            </div><div class="qrcode"><?php ECHO $questao[23]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>os linfócito T e B</li>
              <li>os eritrócitos e os linfócitos T helper</li>
              <li>as células <em>natural killer </em> e os macrófagos</li>
              <li>os neutrófilos e monócitos</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Ao abordar um paciente com necessidade de transplante de rim, a informação de que este possui um irmão gêmeo monozigótico deixou a equipe médica bastante esperançosa. A determinação do padrão zigótico dos gêmeos tornou-se importante, particularmente depois da introdução do transplante de tecidos e órgãos. A determinação do padrão zigótico dos gêmeos é feita por diagnóstico molecular, porque é virtualmente certo que duas pessoas que não sejam gêmeos monozigóticos mostrarão diferenças em alguns dentre o grande número de marcadores de DNA que podem ser estudados.<br>
            Sobre esse assunto, assinale a alternativa CORRETA:</p>
            </div><div class="qrcode"><?php ECHO $questao[24]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A divisão tardia das células embrionárias iniciais resulta em gêmeos dizigóticos.</li>
              <li>Os gêmeos monozigóticos nunca têm anexos separados, estando sempre ligados à mesma placenta.</li>
              <li>Os gêmeos dizigóticos resultam de um zigoto que se divide inicialmente em dois blastômeros separados.</li>
              <li>Quando o disco embrionário não se dividir completamente, podem surgir os gêmeos interligado.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Paciente grávida é atendida na Unidade Básica de Saúde, e faz uso de Carbamazepina. Na Farmacopéia, ressalta-se o risco dessa droga em provocar teratogênese. Sabe-se que o estágio de desenvolvimento de um embrião determina a sua vulnerabilidade a um agente teratogênico, seja uma droga ou vírus, resultando em uma grande variedade de defeitos congênitos. <br> 
            Dentre as alternativas abaixo, é CORRETA a que afirma que:</p>
            </div><div class="qrcode"><?php ECHO $questao[25]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Para provar que um agente é um teratógeno, é preciso mostrar que nas gestações em que a mãe é exposta ao agente, a frequência das anomalias é maior que a frequência das anomalias espontâneas.</li>
              <li>O período mais crítico do desenvolvimento do encéfalo susceptível ao agente teratógeno é de até 3 semanas, embora o seu crescimento continue até os 2 anos após o nascimento.</li>
              <li>O tipo de anomalia congênita produzida pela exposição a um agente teratógeno não depende de que partes, tecidos ou órgãos são mais susceptíveis no momento em que o teratógeno está ativo.</li>
              <li>Um agente biológico, como um vírus, tem potencial teratogênico quando as crianças malformadas apresentarem história de exposição materna mais frequente ao agente do que crianças normais.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Homem de 28 anos comparece à Unidade Básica de Saúde para participar da campanha Novembro Azul e passa por avaliação clínica realizada pelo médico clínico geral, com a preocupação referente a prováveis alterações que possa apresentar.<br> A partir do conhecimento da anatomia do sistema genital masculino, é correto afirmar que:</p>
            </div><div class="qrcode"><?php ECHO $questao[26]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>o ducto deferente é uma continuação da vesícula seminal que desemboca na vesícula seminal;</li>
              <li>no escroto o testículo esquerdo está mais baixo que o direito, em bolsas completamente separadas;</li>
              <li>O corpo cavernoso inicia-se anteriormente por expansão mediana abaixo do diafragma urogenital;</li>
              <li>A próstata é uma glândula que produz líquido seminal, com formato achatado e envolto por tecido adiposo exclusivamente.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> A Organização Mundial da Saúde (OMS) reconhece que a deficiência de vitamina A (DVA) afeta, em nível mundial, aproximadamente 19 milhões de mulheres grávidas e 190 milhões de crianças em idade pré-escolar e a maioria está localizada nas regiões da África e Sudoeste da Ásia (OMS, 2011). No Brasil, a DVA era considerada um problema de saúde pública, sobretudo na Região Nordeste e em alguns locais da Região Sudeste e da Região Norte. Contudo, a Pesquisa Nacional de Demografia e Saúde da Criança e da Mulher (PNDS-2006) traçou o perfil das crianças menores de 5 anos e da população feminina em idade fértil no Brasil e apontou que o problema se estende para todas as regiões brasileiras. <br> 
            Sobre este tema, afirma-se que:</p>
            </div><div class="qrcode"><?php ECHO $questao[27]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A deficiência de vitamina A na gravidez pode resultar em má-formação fetal e dificuldade para enxergar em áreas de elevada luminosidade;</li>
              <li>A presença de alguma alteração ocular sugestiva de ressecamento no olho é sinal de consumo excessivo de vitamina A;</li>
              <li>A reserva adequada de vitamina A em crianças reduz a mortalidade infantil em 24% e mortalidade por diarreia em 28%.</li>
              <li>As alterações observadas diante da deficiência de vitamina A são relativas a alterações oculares apenas, sem acometimento do sistema digestório ou circulatório.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Observe o gráfico setorial a seguir:</p>
            <div class="qrcode"><?php ECHO $questao[28]; ?></div>
            <div class="ennunciation-img-container"><img src="img/questao30.png"></div>
            <p>Os fatores X e Y são, respectivamente:</p>
          </div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Hereditariedade e Hábitos de vida</li>
              <li>Industrialização e Educação</li>
              <li>Disponibilidade Hospitalar e Condição sócio econômica</li>
              <li>Meio ambiente e Herança Genética</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">

        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p> ... podemos tomar o caso do diabetes. Em 1889, se descobre que a alteração metabólica, essência dessa enfermidade, podia ser reproduzida removendo-se o pâncreas, em 1921 detectando-se que a administração de insulina aliviava os sintomas. Estava-se diante de mais um clara demonstração de como uma deficiência na "máquina" provocava doença que podia ser "curada" através do emprego de uma substância específica. Sucessos ainda mais impressionantes proviriam das descobertas da imunologia, elucidação da estrutura do DNA, e, mais recentemente, do mapeamento do genoma humano e das conquistas da engenharia genética. A adesão massiva a este raciocínio tem a ver com as supostas soluções - muitas vezes, em realidade, meramente paliativas por não agirem nas causas propriamente ditas - precisamente por se concentrarem nas partes de um sistema ou de um processo que, na sua essência, são bem mais complexos, e fez com que o mesmo se tornasse hegemônico por quase 14 séculos.</p>
              <p class="reference">Adaptado de Barros, J. A. C. “Pensando o Processo Saúde – Doença....” apresentado no VII Congresso Paulista de Saúde Pública, 2001. pt.slideshare.net/amandaenfbahiana/o-processo-saúde-doença, acesso em 17/09/2016.</p><br>
              <p>Neste texto pode-se concluir que, no que diz respeito ao raciocínio descrito no combate à diabetes, o autor refere-se aquele utilizado no modelo</p>
            </div><div class="qrcode"><?php ECHO $questao[29]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>biomédico.</li>
              <li>processual.</li>
              <li>epidemiológico.</li>
              <li>ecológico.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p><em> (...) Vários modelos foram propostos para estudar os determinantes sociais e a trama de relações entre os diversos fatores estudados através desses diversos enfoques. Um adotado pela CNDSS é o modelo de Dahlgren e Whitehead que inclui os DSS dispostos em diferentes camadas, desde uma camada mais próxima dos determinantes individuais até uma camada distal, onde se situam os macro determinantes, relacionados às condições econômicas, culturais e ambientais da sociedade e que possuem grande influência sobre as demais camadas. Os indivíduos estão na base do modelo, com suas características individuais de idade, sexo e fatores genéticos.</em></p>
              <p class="reference"> Adaptado de: Carvalho, I. & Buss, P. in Determinantes Sociais na Saúde.pdf, acesso em 20/09/2016.</p>
              <p>O modelo de Dahlgren e Whitehead é mostrado na figura a seguir:</p>
              <div class="ennunciation-img-container"><img src="img/questao32.png"></div>
              <p>Neste diagrama a camada X refere-se ao Estilo de Vida da pessoa. Y e Z referem-se, respectivamente à</p>
            </div><div class="qrcode"><?php ECHO $questao[30]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Salário e Energia.</li>
              <li>Transporte e Lazer.</li>
              <li>Convênio médico e Vestuário.</li>
              <li>Educação e Moradia.</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

   <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p> Um tipo de estudo descritivo utilizado em investigações sobre saúde coletiva é o Estudo Ecológico, por exemplo, a pesquisa para estudar a correlação existente entre a mortalidade por doença coronariana e o consumo per capita de cigarros. A respeito das <strong>limitações</strong> dos estudos ecológicos são elaboradas a seguintes afirmações:</p>
              <ol class="roman-numbers">
                <li>
                  Impossibilidade de determinar se existe uma associação entre uma exposição e uma doença em nível individual.
                </li>
                <li>
                  São de duração muito longa e de alto custo.
                </li>
                <li>
                  Os grupos controle, se utilizados, apresentam variáveis que se comportam como fatores de confusão para as conclusões.
                </li>
                <li>
                  Não permitem identificar os grupos mais vulneráveis da população em análise.
                </li>
              </ol>
              <p>Está correto o que se afirma apenas em:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[31]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I e II.</li>
              <li>I e III.</li>
              <li>II e III.</li>
              <li>III e IV.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Observe a tabela 2 x 2, clássica no estudo epidemiológico – coorte</p><br>
              <table class="table table-condensed table-bordered">
                <tr>
                  <th colspan="3">Tabela 2 x 2 nos estudos de coortes</th>
                </tr>
                <tr>
                  <th></th>
                  <th>Doentes</th>
                  <th>Não Doentes</th> 
                </tr>
                <tr>
                  <th>Expostos</th>
                  <th>a</th>
                  <th>b</th> 
                </tr>
                <tr>
                  <th>Não Expostos</th>
                  <th>c</th>
                  <th>d</th> 
                </tr>
              </table>

            <p>A fórmula que permite calcular o Risco Relativo, RR, é:</p>
            </div><div class="qrcode"><?php ECHO $questao[32]; ?></div>
          </div>
          <div class="alternatives-container">
          <!--
            <ol class="alternatives">
              <li class="latex">RR = \frac{\frac{\frac{a}{a+b}}{c}}{c+d}</li>
              <li class="latex">RR = \frac{\frac{\frac{a}{b}}{c}}{d}</li>
              <li class="latex">RR = \frac{\frac{\frac{a}{c+d}}{c}}{a+b}</li>
              <li class="latex">RR = \frac{a+b}{c+d}</li>
            </ol>-->
            <ol class="alternatives">
              <li class="latex-image">
                <img src="img/questao32a.png" />
              </li>
              <li class="latex-image">
                <img src="img/questao32b.png" />
              </li>
              <li class="latex-image">
                <img src="img/questao32c.png" />
              </li>
              <li class="latex-image">
                <img src="img/questao32d.png" />
              </li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Considera-se que uma doença apresenta um surto epidêmico quando sua incidência em um determinado período de tempo é maior do que a Incidência Média Esperada (IME). A IME é calculada como sendo o valor médio da incidência + 2 vezes o desvio padrão da incidência.<br>
            Em outras palavras, uma epidemia mostra uma variação de aproximadamente x% nas “pontas” da curva Normal.<br>
            O valor de x é:</p>
            </div><div class="qrcode"><?php ECHO $questao[33]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>5.</li>
              <li>2.</li>
              <li>10.</li>
              <li>15.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>


   <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Em uma situação normal, sem epidemia, após uma campanha para aumentar a notificação dos casos de difteria, espera-se que o comportamento das taxas de mortalidade, de morbidade e de letalidade seja tal que:</p>
            </div><div class="qrcode"><?php ECHO $questao[34]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>A morbidade, a mortalidade e a letalidade aumentam</li>
              <li>A morbidade aumenta, e a mortalidade e letalidade não se alteram</li>
              <li>A letalidade aumenta, e a mortalidade e a morbidade não se alteram</li>
              <li>A mortalidade não se altera, a morbidade aumenta e a letalidade diminui</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Um estudo de corte foi realizado com a participação de 1000 mulheres fumantes e 2000 mulheres não fumantes da mesma faixa etária das mulheres do outro grupo. Depois de 5 anos, 30 das mulheres fumantes apresentaram um acidente vascular, o mesmo ocorrendo em 20 das não fumantes. Os valores do <strong>Risco Relativo e do Risco Atribuível</strong> são, respectivamente</p>
            </div><div class="qrcode"><?php ECHO $questao[35]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>3 e 10 em 1000.</li>
              <li>1,5 e 10 em 1000.</li>
              <li>3 e 20 em 1000.</li>
              <li>1,5 e 30 em 1000.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p> <strong>O genograma</strong> ou árvore da família é um método de coleta, armazenamento e processamento de informações sobre uma família. Observe os genogramas a seguir:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[36]; ?></div>
            <div class="ennunciation-img-container"><img src="img/questao36.png"></div>
            <p class="">Representa uma família nuclear biparental, o genograma</p>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I</li>
              <li>II</li>
              <li>III</li>
              <li>IV</li>
            </ol>
          </div>
        </div><!--/.item-->
        
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p> (...), a ferramenta de acesso à família PRACTICE foi projetada como uma diretriz para avaliação do funcionamento das famílias, focando-se no problema. A ferramenta é comumente usada para organizar as informações adquiridas da família, facilitando o desenvolvimento da avaliação familiar, podendo ser usada para itens de ordem médica, comportamental e de relacionamentos. (...) Este modelo serve como guia no contato com a família e é usado da seguinte forma: cada letra do acróstico corresponde a um assunto a ser investigado e registrado...</p>
              <p>
              <fieldset>
                P→ problema apresentado; <br>
                R→ papéis de cada membro da estrutura familiar. <br>
                A→ afeto, como a família se comporta diante do problema apresentado; <br>
                C→ tipo de comunicação dentro da estrutura familiar; <br>
                T→ fase do ciclo de vida a família se encontra; <br>
                I→ história de doença na família, passado e presente;<br>
                C→ .....................................................................................; <br>
                E→ recursos que a família possui para enfrentar o problema em questão. <br>
              </fieldset>
              </p>
              <p class="reference">Adaptado de Silva, J. & Santos, S. “Trabalhando com Famílias Utilizando Ferramentas” in Revista APS, v.6, n.2, p.77-86, jul./dez. 2003.</p>
              <p>A segunda letra <strong>C</strong> refere-se à:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[37]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>ao comportamento da família frente a uma situação econômica desfavorável.</li>
              <li>à maneira como reagiriam frente a um bilhete de loteria premiado.</li>
              <li>ao modo como demonstram afeto uns com os outros.</li>
              <li>à maneira como os membros da família enfrentam o estresse da vida.</li>
            </ol>
          </div>
        </div><!--/.item-->
       </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p><div class="ennunciation-img-container"><img src="img/questao38.png"></div></p>
              <p class="reference"> Fonte: Da Ros MA. A ideologia nos cursos de medicina. In: Marins JJN, Rego S, Lampert JB, Araújo JGC (Orgs.). Educação médica em transformação: instrumentos para a construção de novas realidades. São Paulo: Hucitec, 2004. </p>
              <p>Observe a relação de algumas práticas médicas que podem ser oferecidas aos alunos de um curso de medicina:</p>
              <ol class="roman-numbers">
               <li>na rede do sistema de saúde em graus crescentes de complexidade voltada para as necessidades de saúde prevalentes dentro de uma visão inter setorial com enfoque na saúde;</li>
               <li>no hospital secundário e terciário com enfoque fortemente voltado para as doenças graves.</li>
               <li>cobrindo vários programas e serviços de forma integral (adulto, materno-infantil, medicina do trabalho, urgências, etc.).</li>
               <li>com o aluno observador da prática em oportunidade e em atividades selecionadas. </li>
               <li>quando oportunizadas ao aluno se restringe ao âmbito das especialidades. </li>
              </ol>
              <p>Caracterizam um <strong>ensino inovador</strong> o que contempla as práticas médicas definidas em:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[38]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I e II.</li>
              <li>I e III.</li>
              <li>II e IV.</li>
              <li>III, IV e V.</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!--PAGE-->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> Segundo os regulamentos do SUS, os recursos destinados ao custeio de transplantes são pagos através</p>
            </div><div class="qrcode"><?php ECHO $questao[39]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>do Piso Assistencial Básico (PAB) variável.</li>
              <li>do Fundo de Ações Estratégicas e Compensação (FAEC)</li>
              <li>da Autorização de Procedimento de Alto Custo (APAC)</li>
              <li>da Fração Assistencial Especializada (FAE).</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p> O novo modelo de Atenção à Saúde baseia-se, entre outros:</p>
            </div><div class="qrcode"><?php ECHO $questao[40]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Na ética do médico, na qual a pessoa constitui o foco da atenção.</li>
              <li>No modelo epidemiológico.</li>
              <li>No modelo terapêutico.</li>
              <li>Na ética do coletivo que incorpora e transcende ao individual.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>



      <!-- _______________PAGE 27_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Os profissionais das Unidades Básicas de Saúde (UBS) são responsáveis pelas ações de prevenção e controle da dengue. Estas ações devem fazer parte das rotinas e estarem integradas às demais ações desenvolvidas nestas unidades. A respeito das atribuições do Agente Comunitário de Saúde são feitas as seguintes afirmações:</p>

            <ol class="roman-numbers">
             <li>promover reuniões com a comunidade com o objetivo de mobilizá-la para as ações de prevenção e controle da dengue.</li>
             <li>vistoriar imóveis não residenciais, acompanhado pelo responsável, para identificar locais de existência de objetos que sejam ou possam se transformar em criadouros.</li>
             <li>orientar e acompanhar o morador na remoção, destruição ou vedação de objetos que possam se transformar em criadouros de mosquitos.</li>
             <li>remover mecanicamente os ovos e larvas do mosquito.</li>
             <li>vistoriar e tratar com aplicação de larvicida, caso seja necessário, os pontos estratégicos.</li>
            </ol>

            <p>Das atribuições acima, estão corretas apenas:</p>
            </div><div class="qrcode"><?php ECHO $questao[41]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I, II e III.</li>
              <li>II, III e IV.</li>
              <li>II, IV e V.</li>
              <li>I, III e IV.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 27_________________ -->

      <!-- _______________PAGE 28_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Em relação aos princípios ou diretrizes do SUS, definidos pela Lei Orgânica da Saúde são feitas as seguintes afirmações:</p>

            <ol class="roman-numbers">
             <li>descentralização dos serviços para os municípios com direção única em cada esfera do governo</li>
             <li>integralidade da assistência à saúde, incorporando ações e serviços individuais e coletivos, preventivos e curativos</li>
             <li>liberdade da iniciativa privada para prestar assistência técnica à saúde</li>
             <li>saúde como direito de todos e dever do Estado</li>
             <li>universalidade do acesso ao sistema, com atendimento preferencial à população de baixa renda</li>
            </ol>


            <p>Está correto <strong>apenas</strong> o que se afirma em
            </p>
            </div><div class="qrcode"><?php ECHO $questao[42]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I, II e IV.</li>
              <li>I, III e V.</li>
              <li>I e II.</li>
              <li>I, II, III e IV.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Dos programas propostos pelo governo federal, aquele que tem o financiamento previsto no componente variável do Piso da Atenção Básica (PAB) é:</p>
            </div><div class="qrcode"><?php ECHO $questao[43]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Agentes comunitários de saúde</li>
              <li>Farmácia popular</li>
              <li>Educação permanente</li>
              <li>Vigilância em saúde</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 28_________________ -->
     <!-- _______________PAGE 29_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Um menino de 2 anos é levado a um hospital porque tem febre. O médico que o examina detecta um severo comprometimento geral no estado da criança, grande irritabilidade e, no exame clínico encontra rigidez na nuca, e explica aos pais que será necessária uma punção lombar para detectar uma possível meningites. Informa que se for este o caso, o tratamento deve ser imediato. Os pais do menino não aceitam este procedimento, pois acreditam que ele é de grande risco. O médico tenta, em vão, chegar a um consenso para mudar a decisão dos pais. Diz, finalmente, que fará a punção.</p>
              <p>Do ponto de vista ético, a atitude do médico está</p>
            </div><div class="qrcode"><?php ECHO $questao[44]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Errada, porque ainda que se trate de uma questão técnica, apoiada por evidência médica indiscutível, a palavra final cabe aos pais, que representam o direito do filho.</li>
              <li>Correta, porque trata-se de uma questão técnica, apoiada por evidência médica indiscutível, e diante da negativa dos pais ele deve velar pelo direito de quem não é competente para fazê-lo.</li>
              <li>Correta, pois a informação do procedimento necessário só foi dada aos pais por uma questão de gentileza, visto que a decisão do médico é independente.</li>
              <li>Errada, porque o médico deveria recorrer a uma ordem judicial, já que a decisão dos pais é altamente prejudicial à criança, em que pese a gravidade do possível diagnóstico.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Afirma-se que o tamanho de uma amostra depende</p>

            <ol class="roman-numbers">
                 <li>do grau de confiança (Zα) que é admitido pelo pesquisador; usualmente de 95% (0,05) e 99% (0,01).</li>
                 <li>da variabilidade da população isto é, quanto menor a homogeneidade da população, maior o tamanho da amostra.</li>
                 <li>do tamanho da população: quanto maior o tamanho da população maior será o tamanho da amostra.</li>
                 <li>do erro máximo admitido pelo pesquisador: quanto maior o erro admitido, maior será o tamanho da amostra.</li>
            </ol>


              <p>
                Estão corretas apenas as afirmativas:
              </p>
            </div><div class="qrcode"><?php ECHO $questao[45]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I e III.</li>
              <li>I, III e IV.</li>
              <li>I e II.</li>
              <li>II, III e IV.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 29_________________ -->
     <!-- _______________PAGE 30_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Um estudo para avaliar a eficácia de um medicamento, no tratamento de asma brônquica, avaliou 60 pacientes portadores desta doença. Os pacientes foram divididos em dois grupos: tratados com o medicamento e não tratados, cada qual com 30 indivíduos. O valor do teste Qui-quadrado na tabela é 3,841, para um grau de liberdade e a um nível de significância escolhido de 95%, e o valor do Qui-quadrado encontrado no estudo foi de 0,72. O resultado do teste permite afirmar que
            </p>
            </div><div class="qrcode"><?php ECHO $questao[46]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>a probabilidade de dependência entre o uso de medicamento e a doença é 0,05.</li>
              <li>não há associação entre a eficácia do medicamento e a asma brônquica.</li>
              <li>a probabilidade de dependência entre o uso de medicamento e a doença é 0,72.</li>
              <li>A taxa de resultado favorável do grupo que recebeu o medicamento é significativamente menor do que a observada no outro grupo.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Uma equipe de profissionais de saúde dispõe do registro de pessoas de uma comunidade que foram vacinadas contra gripe, que inclui a informação no momento da vacinação sobre antecedentes patológicos, idade, sexo e tipo de vacina. Para os mesmos sujeitos dispõe também do registro de diagnósticos de altas hospitalares, ocorridos em época posterior à vacinação, além de identificador pessoal comum aos dois registros.<br>
            Marque a alternativa que mostra um possível estudo que pode ser feito com estes registros.
            </p>
            </div><div class="qrcode"><?php ECHO $questao[47]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Um estudo analítico de coorte para determinar se a vacinação aumenta o risco de desenvolver uma síndrome de Guillain-Barré nas 16 primeiras semanas após a vacinação.</li>
              <li>Uma análise descritiva para estimar a incidência de febre na primeira semana depois da vacina antigripal.</li>
              <li>Um estudo descritivo para estimar a incidência de infarto agudo do miocárdio nas primeiras 16 semanas após a vacinação.</li>
              <li>Um ensaio clínico que compare o risco de reações graves pós vacina (que suponham ingresso hospitalar) com os tipos de vacinas utilizados na campanha.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 30_________________ -->
    <!-- _______________PAGE 31_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Considere as ações de saúde </p>

            <ol class="roman-numbers">
             <li>Fluoretação dos sistemas de abastecimento de água </li>
             <li>Imunização de crianças contra a poliomielite</li>
             <li>Dietas para controle de diabetes </li>
             <li>Realização de mamografia para detectar câncer de mama </li>
             <li>Tratamento fisioterápico para recuperação de movimentos</li>
            </ol>

            <p>
              Chamando de P, S e T, respectivamente, de primárias, secundárias e terciárias de ações de saúde, a sequência dada em I, II, III, IV e V podem ser classificadas em
            </p>
            </div><div class="qrcode"><?php ECHO $questao[48]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>P, P, P, T, T</li>
              <li>P, P, S, S, T</li>
              <li>S, S, P, P, S</li>
              <li>P, S, S, T, T</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Preparando-se para uma reunião com as mulheres de uma comunidade para discutirem Controle de Natalidade, um médico encontrou uma pesquisa relacionando o uso de anticoncepcional oral com o risco de a mulher sofrer um infarto do miocárdio em um período de 10 anos. No trabalho estudado, há o resultado do cálculo do Risco Relativo igual a 1,6.<br>
            Certamente o médico deverá relatar às mulheres, na reunião, o risco decorrente do uso do medicamento. Uma forma didática de referir-se ao fato é dizer que “se 10 mulheres usarem a pílula anticoncepcional <strong>x</strong> delas correm o risco de ter um infarto em 10 anos”, e esta frase estará correta se x for igual a
            </p>
            </div><div class="qrcode"><?php ECHO $questao[49]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>2</li>
              <li>4</li>
              <li>6</li>
              <li>8</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 31_________________ -->
    <!-- _______________PAGE 32_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>São características do processo de trabalho das equipes de Atenção Básica:</p>

            <ol class="roman-numbers">
             <li>desenvolvimento de ações que priorizem os grupos de risco e os fatores de risco clínico-comportamentais, alimentares e/ou ambientais, com a finalidade de prevenir o aparecimento ou a persistência de doenças e danos evitáveis.</li>
             <li>realização do acolhimento com escuta qualificada, classificação de risco, avaliação de necessidade de saúde e análise de vulnerabilidade tendo em vista a responsabilidade da assistência resolutiva à demanda espontânea.</li>
             <li>promoção de atenção integral.</li>
            </ol>


              <p>Falta a esta sequência de características:</p>
            </p>
            </div><div class="qrcode"><?php ECHO $questao[50]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Definição do território de atuação e de população sob responsabilidade das UBS e das equipes.</li>
              <li>Atenção privilegiada às doenças transmissíveis.</li>
              <li>Desenvolvimento de ações específicas voltadas para as gestantes.</li>
              <li>Providências cabíveis para obter o local de trabalho da equipe.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>O aumento da distância entre uma fonte de radiação ionizante e um indivíduo é, também, uma solução simples para minimizar a Exposição, e, consequentemente, o acúmulo de Dose.
            No caso de fontes puntiformes, é válida a Lei do <strong>inverso do quadrado da distância</strong>, isto é:<br>
            <img src="img/questao51.png" heigth="150px" width="150px"> ,onde D1 e D2 são as taxas de doses nas distâncias d1 e d2 da fonte.<br>
            Por exemplo, quando a distância de um indivíduo à fonte dobra, a dose, em relação ao seu valor inicial fica reduzida a
            </p>
            </div><div class="qrcode"><?php ECHO $questao[51]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>1/2</li>
              <li>1/4</li>
              <li>1/8</li>
              <li>1/16</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 32_________________ -->
    <!-- _______________PAGE 33_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Antes da criação do SUS, o Ministério da Saúde atuava na área de assistência à saúde por meio de alguns poucos hospitais especializados, além da ação da Fundação de Serviços Especiais de Saúde Pública em regiões específicas do País. Nesse período, a assistência à saúde mantinha uma vinculação muito próxima com determinadas atividades e o caráter contributivo do sistema existente gerava uma divisão da população brasileira em dois grandes grupos (além da pequena parcela da população que podia pagar os serviços de saúde por sua própria conta). Esses grupos eram formados</p>
            </div><div class="qrcode"><?php ECHO $questao[52]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>pelos profissionais de saúde e a população leiga.</li>
              <li>pelos previdenciários e os não previdenciários.</li>
              <li>pelos sindicalizados e os autônomos.</li>
              <li>pelas populações propensas a endemias e as urbanas.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Leia a seguir algumas informações sobre o desenvolvimento das políticas de saúde no Brasil em quatro conjunturas republicanas: a República Velha (1889-1930), a Era Vargas (1930- 1964), o Autoritarismo (1964-1984) e a Nova República (1985-1988).</p>


            <ol class="roman-numbers">
             <li>Na República Velha, predominavam as doenças transmissíveis, como a febre amarela urbana, varíola, tuberculose, sífilis, além das endemias rurais.</li>
             <li>Na Era Vargas, a saúde pública passa a ter sua institucionalização, na esfera federal, pelo Ministério da Educação e Saúde, enquanto a medicina previdenciária e a saúde ocupacional vinculavam-se ao Ministério do Trabalho.</li>
             <li>No Autoritarismo, houve a unificação dos Institutos de Aposentadorias e Pensões (IAP), criando o Instituto Nacional de Previdência Social (INAMPS).</li>
             <li>As políticas de saúde executadas durante a Nova República privilegiaram o setor privado mediante a compra de serviços de assistência médica, o apoio aos investimentos e os empréstimos com subsídios.</li>
            </ol>

            <p>
              Está correto <strong>apenas</strong> o que se afirma em
            </p>
            </div><div class="qrcode"><?php ECHO $questao[53]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I e II.</li>
              <li>II e III.</li>
              <li>II, III e IV.</li>
              <li>I, II e III.</li>
            </ol>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 33_________________ -->
    <!-- _______________PAGE 34_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Todo laboratório precisa contar com material de emergência como medicamentos, manta apaga-fogo, produto lava-olhos, extintores de incêndio. Além disso, é preciso ficar atento para os avisos de segurança presentes nos frascos de reagentes, produtos potencialmente perigosos.<br>Observe a tabela:</p>
              <div class="ennunciation-img-container"><img src="img/questao54.png"></div>
              <p>A relação correta entre os símbolos da coluna 1 e os elementos da coluna 2 é:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[54]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>I e P, II e O, III e M, IV e N</li>
              <li>I e O, II e P, III e M, IV e N</li>
              <li>I e N, II e P, III e O, IV e M</li>
              <li>I e M, II e N, III e O, IV e P</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 34_________________ -->
    <!-- _______________PAGE 35_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Paciente comparece ao Serviço de Urgência apresentando quadro de diarreia. Foi feito exame de fezes e se observou em microscópio a seguinte imagem:</p>
              <div class="ennunciation-img-container"><img src="img/questao55.png"></div>
              <p>Considerando o quadro apresentado pelo paciente, a imagem da lâmina e seus conhecimentos, o microorganismo em questão e sua forma de transmissão são, respectivamente:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[55]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li><em>Giardia lamblia</em>; contaminação orofecal e toalhas contaminadas.</li>
              <li><em>Entamoeba hystolitica</em>; contágio por transposição percutânea e contato sanguíneo.</li>
              <li><em>Vibrio cholerae</em>; ingestão de água ou de alimentos contaminados.</li>
              <li><em>Yersinia enterocolitica</em>; ingestão de leite pasteurizado e ovo contaminado.</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 35_________________ -->
    <!-- _______________PAGE 36_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Ao visitar a área rural de um município, juntamente com a equipe da Estratégia da Saúde de Família, o agente comunitário observa a presença de um inseto “diferente” dos demais, e resolve fotografar e mostrar aos membros da equipe:</p>
              <div class="ennunciation-img-container"><img src="img/questao56.png" /></div>
              <p>Também constata que alguns moradores estão se queixando de febre prolongada recorrente, cefaléia, diarréia e vômito. Ao serem avaliados pelo médico, este constata nos moradores sinais como hepato e esplenomegalia, edema bipalpebral unilateral (sinal de Romaña) e lesão de pele sem supuração (chagoma).<br> Com base na história apresentada, o agente etiológico provável da doença endêmica em questão, suas fases clínicas, e as formas de prevenção são, respectivamente:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[56]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li><em>Trypanosoma cruzi</em>; fase aguda e fase crônica; uso de repelentes e roupas com mangas compridas;</li>
              <li><em>Arbovírus</em> do gênero <em>Flavivírus</em>; fase inicial e fase tardia; uso de água tratada e alimentos cozidos;</li>
              <li><em>Rickettsia</em>; fase intrínseca e fase extrínseca; evitar o contato com pessoa doente, seja por contato físico ou com saliva, urina ou fezes.</li>
              <li><em>Leptospira sp.</em>; fase inicial, fase crônica e fase latente; vacinação de animais de estimação.</li>
            </ol>
          </div>
        </div><!--/.item-->
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 36_________________ -->
    <!-- _______________PAGE 37_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>O esquema abaixo se refere ao ciclo de transmissão e desenvolvimento da <strong>malária</strong>.</p>
              <div class="ennunciation-img-container"><img src="img/questao57.png"></div>
              <p>Sobre essa patologia, é correto o que se afirma em:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[57]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>O vírus <em>Flavivirus</em> é o agente etiológico da malária e o mosquito vetor é o <em>Culex sp</em>.</li>
              <li>O mosquito representado é o <em>Anopheles</em>, e o agente etiológico o protozoário <em>Plasmodium</em></li>
              <li>O reservatório é o mosquito <em>Haemagogus janthinomys</em>, sendo o homem o hospedeiro natural do agente etiológico, o vírus amarílico.</li>
              <li>O mosquito da espécie <em>Lutzomyia longipalpis</em> é infectado por gametócitos de <em>Leptospira</em>, por transmissão indireta.</li>
            </ol>
          </div>
        </div><!--/.item-->
        
        

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 37_________________ -->
    <!-- _______________PAGE 38_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Novas diretrizes terapêuticas para o tratamento de três infecções sexualmente transmissíveis (ISTs) foram emitidas pela Organização Mundial da Saúde (OMS) em resposta à crescente ameaça de resistência aos antibióticos.<em>“A clamídia, a gonorreia e a sífilis são importantes problemas de saúde pública em todo o mundo: diminuem a qualidade de vida de milhões de pessoas e provocam graves patologias, podendo levar à morte.</em>”
              <em class="reference">OMS, 30/08/2016</em></p>
              <p>Considerando a sífilis mencionada no texto acima, é correto o que se afirma em:</p>
            </div><div class="qrcode"><?php ECHO $questao[58]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>O resultado de sua contaminação resulta no desenvolvimento de câncer do colo de útero, vulva, pênis e ânus, curável quando instituída as medidas terapêuticas quimioterápicas adequadas;</li>
              <li>A transmissão ocorre por via sexual, exclusivamente, aconselhando-se que o uso preservativo seja a única forma de prevenção eficaz para se evitar o contágio entre os parceiros;</li>
              <li>A transmissão da sífilis pode ocorrer por via materno-infantil em mulheres portadoras da bactéria, em virtude do patógeno ser capaz de transpor a barreira placentária</li>
              <li>As lesões incapazes de cicatrizar, na pele ou na mucosa, formam úlceras de bordos circulares elevados e fundos granulosos que destroem os tecidos, não desaparecendo enquanto o paciente for portador da bactéria.</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 38_________________ -->
    <!-- _______________PAGE 39_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Um trabalhador da lavoura compareceu à Unidade Básica de Saúde apresentando náuseas, vômitos, diarreia, dor abdominal, flatulência e prurido. Detectou-se no exame clínico e laboratorial anemia, hipoproteinemia e insuficiência cardíaca.<br> O ciclo do agente patogênico causador dos sinais e sintomas desse lavrador é representado no desenho abaixo:</p>
              <div class="ennunciation-img-container"><img src="img/questao59.jpg"></div>
              <p>Considerando as informações coletadas e o esquema, é correto afirmar que:</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[59]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>Os ovos desse agente, ao serem depositados no solo, esporulam até que desidratem e voltem a se desenvolver e completar seu ciclo;</li>
              <li>As larvas dos ancilóstomos penetram pela pele e passam pelos vasos linfáticos até a corrente sanguínea e, nos pulmões, penetram nos alvéolos.</li>
              <li>A transmissão do agente etiológico ocorre também de pessoa para pessoa, por contato com vestimentas, toalhas e pertences do paciente.</li>
              <li>Os ovos são deglutidos a partir da contaminação das mãos pelo contato com o solo infectado, atingindo a maturidade no estômago, onde se fixam, e produzem mais ovos.</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 39_________________ -->
    <!-- _______________PAGE 40_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>A esquistossomose mansônica é uma doença parasitária causada pelo trematódio <em>Schistosoma mansoni</em>, cujos sintomas dependem do seu estágio de evolução, seja no estágio agudo ou crônico. Sobre essa doença endêmica, de notificação compulsória nas áreas não-endêmicas, afirma-se que na fase:</p>
            </div><div class="qrcode"><?php ECHO $questao[60]; ?></div>
          </div>
          <div class="alternatives-container">
            <ol class="alternatives">
              <li>...crónica a forma hepatoesplênica compensada é a forma mais grave e o fígado apresenta áreas de fibrose.</li>
              <li>... crônica, o hospedeiro apresenta febre de Katayama, linfadenopatia, dor abdominal e diarreia.</li>
              <li>... aguda, observa-se hipertensão portal e esplenomegalia, podendo apresentar hematêmese e/ou melena.</li>
              <li>... aguda, o hospedeiro pode ser assintomático ou apresentar micropápulas eritematosas e pruriginosas.</li>
            </ol>
          </div>
        </div><!--/.item-->
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 40_________________ -->
    <!-- _______________PAGE 41_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>

      <h1 class="text-center">Questões dissertativas</h1>
      <div class="page-content">
        <!-- QUESTAO -->
        <div class="item dissertative">
          <div class="ennunciation-container">
            <div class="ennunciation"><p><em>Os pais de Maria, uma menina de 3 anos, levam-na ao pronto socorro infantil porque apresenta dificuldade respiratória. Sua mãe informa que há dois dias Maria tem febre, tosse, muitos “ruídos” no peito e que o catarro quase provoca afogamento. Ela conta ainda, que Maria tem uma doença degenerativa, diagnosticada quando a criança tinha 1 ano. Já apresentou episódios semelhantes que puderam ser cuidados em casa, mas desta vez é mais grave. A criança está febril, pálida, com cianoses peri-oral e saturação de oxigênio de 87%. O médico pode ainda perceber que Maria é uma criança desconectada do meio, com severo comprometimento do desenvolvimento psicomotor e hipertonia generalizada. A radiografia de tórax mostra condensação direita e os resultados de exames laboratoriais são compatíveis com infecção bacteriana. Em caráter de urgência, se aspiram as secreções e dão oxigênio por máscara. O médico diz aos pais que podem levar Maria para casa, lhes entrega uma receita de antibiótico, e marca uma consulta para outra drenagem de secreções intrabrônquicas. Informa ainda que, dada a condição básica de Maria, não é recomendável hospitalizá-la, já que não tem possibilidade de sobrevida e, neste caso, segundo ele, o melhor é que Maria esteja com a família até o final. Os pais insistem que não possuem os recursos necessários para cuidar da filha em casa, que lutaram muito por ela, conhecem bem sua doença, e que se é o final da sua vida não querem vê-la sofrer, visto que, com pouca ajuda de enfermeiras, ela mostra melhora das suas dificuldades respiratórias.</em></p>
            <p>No caso de Maria, o problema que está posto não é a decisão técnica de qual antibiótico é o mais adequado, mas surgem questões mais complexas como: é lícito limitar o esforço terapêutico nesta paciente? Até onde chegar com o tratamento? O médico deve usar todos os recursos e a qualquer custo?</p>
            <p>Em no máximo 15 linhas discuta esse problema ético, sob o <strong>juízo de proporcionalidade</strong>. Se esse juízo for favorável à restrição de ações terapêuticas, discuta o curso que os cuidados devem seguir.</p>
            </p>
            </div><div class="qrcode"><?php ECHO $questao[61]; ?></div>
          </div>
        </div><!--/.item-->
        
        <!-- QUESTAO -->
        <div class="item dissertative">
          <div class="ennunciation-container">
            <div class="ennunciation"><p>Em no máximo 15 linhas descreva o comportamento de um médico que faz medicina baseada em evidência a partir de um caso possivelmente real (um exemplo criado por você)</p>
            </div><div class="qrcode"><?php ECHO $questao[62]; ?></div>
          </div>
        </div><!--/.item-->

      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________PAGE 41_________________ -->
    <!-- _______________PAGE 42_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>
      
      <h1 class="text-center">Questões dissertativas</h1>
      <div class="page-content">
        
        <!-- QUESTAO -->
        <div class="item dissertative">
          <div class="ennunciation-container">
            <div class="ennunciation">
              <p>Os dados apresentados na tabela e no gráfico a seguir refletem, em parte, a situação da saúde pública no Brasil, com possíveis conclusões a partir dos resultados de estudos de projeção para 2020.</p>
                <table class="table table-condensed table-bordered" style="float: left;width: 45%;font-size: 9pt; margin: 10px auto 0">
                  <tr>
                    <th colspan="4"><h5>Projeções de médico/habitante em unidades da federação para o ano de 2020</h5></th>
                  </tr>
                    <tr>
                      <th>Estado</th>
                      <th>Razão Méd./Hab. 2010</th>
                      <th>Médicos 2020</th>
                      <th>Razão Méd./Hab. 2020‡</th>
                    </tr>
                    <tr>
                      <td>Maranhão</td>
                      <td class="text-right">0.65</td>
                      <td class="text-right">6.778</td>
                      <td class="text-right">0.93</td>
                    </tr>
                    <tr>
                      <td>Pará</td>
                      <td class="text-right">0.81</td>
                      <td class="text-right">8.813</td>
                      <td class="text-right">0.98</td>
                    </tr>
                    <tr>
                      <td>Acre</td>
                      <td class="text-right">0.89</td>
                      <td class="text-right">917</td>
                      <td class="text-right">1.02</td>
                    </tr>
                    <tr>
                      <td>Amapá</td>
                      <td class="text-right">1.00</td>
                      <td class="text-right">965</td>
                      <td class="text-right">1.09</td>
                    </tr>
                    <tr>
                      <td>Piauí</td>
                      <td class="text-right">1.00</td>
                      <td class="text-right">4.698</td>
                      <td class="text-right">1.40</td>
                    </tr>
                    <tr>
                      <td>Alagoas</td>
                      <td class="text-right">1.04</td>
                      <td class="text-right">4.833</td>
                      <td class="text-right">1.42</td>
                    </tr>
                    <tr>
                      <td>Paraíba</td>
                      <td class="text-right">1.08</td>
                      <td class="text-right">6.408</td>
                      <td class="text-right">1.57</td>
                    </tr>
                    <tr>
                      <td>Ceará</td>
                      <td class="text-right">1.10</td>
                      <td class="text-right">14.265</td>
                      <td class="text-right">1.58</td>
                    </tr>
                    <tr>
                      <td>Tocantins</td>
                      <td class="text-right">1.15</td>
                      <td class="text-right">2.620</td>
                      <td class="text-right">1.61</td>
                    </tr>
                    <tr>
                      <td>Bahia</td>
                      <td class="text-right">1.17</td>
                      <td class="text-right">24.036</td>
                      <td class="text-right">1.69</td>
                    </tr>
                    <tr>
                      <td>Rio G Norte</td>
                      <td class="text-right">1.21</td>
                      <td class="text-right">6.013</td>
                      <td class="text-right">1.71</td>
                    </tr>
                    <tr>
                      <td>Pernambuco</td>
                      <td class="text-right">1.22</td>
                      <td class="text-right">15.919</td>
                      <td class="text-right">1.73</td>
                    </tr>
                    <tr>
                      <td>Amazonas</td>
                      <td class="text-right">1.26</td>
                      <td class="text-right">7.500</td>
                      <td class="text-right">1.88</td>
                    </tr>
                    <tr>
                      <td>Sergipe</td>
                      <td class="text-right">1.30</td>
                      <td class="text-right">4.392</td>
                      <td class="text-right">1.89</td>
                    </tr>
                    <tr>
                      <td>Mato Gros</td>
                      <td class="text-right">1.33</td>
                      <td class="text-right">6.633</td>
                      <td class="text-right">1.90</td>
                    </tr>
                    <tr>
                      <td>Rondônia</td>
                      <td class="text-right">1.33</td>
                      <td class="text-right">3.561</td>
                      <td class="text-right">2.08</td>
                    </tr>
                    <tr>
                      <td>Goiás</td>
                      <td class="text-right">1.46</td>
                      <td class="text-right">15.927</td>
                      <td class="text-right">2.33</td>
                    </tr>
                    <tr>
                      <td>Roraima</td>
                      <td class="text-right">1.52</td>
                      <td class="text-right">1.311</td>
                      <td class="text-right">2.35</td>
                    <tr>
                      <td>Mato G Sul</td>
                      <td class="text-right">1.62</td>
                      <td class="text-right">6.721</td>
                      <td class="text-right">2.42</td>
                    </tr>
                    <tr>
                      <td>Paraná</td>
                      <td class="text-right">1.80</td>
                      <td class="text-right">27.657</td>
                      <td class="text-right">2.51</td>
                    </tr>
                    <tr>
                      <td>Min. Gerais</td>
                      <td class="text-right">1.84</td>
                      <td class="text-right">53.289</td>
                      <td class="text-right">2.60</td>
                    </tr>
                    <tr>
                      <td>Rio G Sul</td>
                      <td class="text-right">1.93</td>
                      <td class="text-right">30.497</td>
                      <td class="text-right">2.78</td>
                    </tr>
                    <tr>
                      <td>Esp. Santo</td>
                      <td class="text-right">2.06</td>
                      <td class="text-right">10.592</td>
                      <td class="text-right">2.85</td>
                    </tr>
                    <tr>
                      <td>S Catarina</td>
                      <td class="text-right">2.31</td>
                      <td class="text-right">20.483</td>
                      <td class="text-right">2.87</td>
                    </tr>
                    <tr>
                      <td>São Paulo</td>
                      <td class="text-right">2.59</td>
                      <td class="text-right">142.425</td>
                      <td class="text-right">3.31</td>
                    </tr>
                    <tr>
                      <td>R Janeiro</td>
                      <td class="text-right">3.65</td>
                      <td class="text-right">71.160</td>
                      <td class="text-right">4.44</td>
                    </tr>
                    <tr>
                      <td>D Federal</td>
                      <td class="text-right">4.03</td>
                      <td class="text-right">16.483</td>
                      <td class="text-right">5.54</td>  
                    </tr>
                </table>
              <div class="ennunciation-img-container" style="float:right;width: 50%;display: inline-block;">
                <h5>Projeção para a relação de postos de trabalho médico ocupados nos setores público e privado, 2010 - 2020.</h5>
                <img src="img/questao63.png" style="max-width: 100%">
                <p class="reference">(2005 a 2010: dados observados; 2011 a 2020: dados projetados pelo estudo)</p>
              </div>
              <div style="clear:both" style="text-align: left;"></div>

                <p class="reference" style="text-align: left;">Fonte: Demografia Médica no Brasil. Estudo de Projeção - Concentração de Médicos no Brasil em 2020. Conselho Federal de Medicina (CFM) e Conselho Regional de Medicina do Estado de São Paulo (Cremesp). 2015. http://portal.cfm.org.br/ - consultado em 10 setembro 2016.</p>
              <p>Justifique, em no máximo 15 linhas, e mencionando dados do gráfico e da tabela, a opinião de muitos especialistas que afirmam que apenas o aumento de escolas de medicina não melhora a situação da saúde pública do Brasil.</p>
            </div>
            <div class="qrcode"><?php ECHO $questao[63]; ?></div>
          </div>
      </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>

    <!-- _______________PAGE 42_________________ -->
    <!-- _______________DISCURSIVA 2_________________ -->
    <section class="page dissertative-answer-container">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>
      
      <h1 class="text-center">Caderno de Respostas - Questões Discursivas</h1>
      <div class="page-content">
      
        <table class="form form-table name-table">
          <thead>
            <tr>
              <th><?php ECHO $nomes[$id]; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Assine conforme documento apresentado</td>
            </tr>
          </tfoot>
        </table>
        <div class="dissetative-answer">
          <table class="table model">
            <tr>
            <th colspan="2">Questão 61</th>
            </tr>
            <tr><td>1</td><td></td></tr>          
            <tr><td>2</td><td></td></tr>
            <tr><td>3</td><td></td></tr>
            <tr><td>4</td><td></td></tr>
            <tr><td>5</td><td></td></tr>
            <tr><td>6</td><td></td></tr>
            <tr><td>7</td><td></td></tr>
            <tr><td>8</td><td></td></tr>
            <tr><td>9</td><td></td></tr>
            <tr><td>10</td><td></td></tr>
            <tr><td>11</td><td></td></tr>
            <tr><td>12</td><td></td></tr>
            <tr><td>13</td><td></td></tr>
            <tr><td>14</td><td></td></tr>
            <tr><td>15</td><td></td></tr>
        </table>
  

    </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________DISCURSIVA 2_________________ -->
    <!-- _______________DISCURSIVA 3_________________ -->
    <section class="page dissertative-answer-container">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>
      
      <h1 class="text-center">Caderno de Respostas - Questões Discursivas</h1>
      <div class="page-content">
      
        <table class="form form-table name-table">
          <thead>
            <tr>
              <th><?php ECHO $nomes[$id]; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Assine conforme documento apresentado</td>
            </tr>
          </tfoot>
        </table>
        <div class="dissetative-answer">
          <table class="table model">
            <tr>
            <th colspan="2">Questão 62</th>
            </tr>
            <tr><td>1</td><td></td></tr>          
            <tr><td>2</td><td></td></tr>
            <tr><td>3</td><td></td></tr>
            <tr><td>4</td><td></td></tr>
            <tr><td>5</td><td></td></tr>
            <tr><td>6</td><td></td></tr>
            <tr><td>7</td><td></td></tr>
            <tr><td>8</td><td></td></tr>
            <tr><td>9</td><td></td></tr>
            <tr><td>10</td><td></td></tr>
            <tr><td>11</td><td></td></tr>
            <tr><td>12</td><td></td></tr>
            <tr><td>13</td><td></td></tr>
            <tr><td>14</td><td></td></tr>
            <tr><td>15</td><td></td></tr>
        </table>    
      </div>
    </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________DISCURSIVA 3_________________ -->
    <!-- _______________DISCURSIVA 4_________________ -->
    <section class="page dissertative-answer-container">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>
      
      <h1 class="text-center">Caderno de Respostas - Questões Discursivas</h1>
      <div class="page-content">
      
        <table class="form form-table name-table">
          <thead>
            <tr>
              <th><?php ECHO $nomes[$id]; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Assine conforme documento apresentado</td>
            </tr>
          </tfoot>
        </table>
        <div class="dissetative-answer">
          <table class="table model">
            <tr>
            <th colspan="2">Questão 63</th>
            </tr>
            <tr><td>1</td><td></td></tr>          
            <tr><td>2</td><td></td></tr>
            <tr><td>3</td><td></td></tr>
            <tr><td>4</td><td></td></tr>
            <tr><td>5</td><td></td></tr>
            <tr><td>6</td><td></td></tr>
            <tr><td>7</td><td></td></tr>
            <tr><td>8</td><td></td></tr>
            <tr><td>9</td><td></td></tr>
            <tr><td>10</td><td></td></tr>
            <tr><td>11</td><td></td></tr>
            <tr><td>12</td><td></td></tr>
            <tr><td>13</td><td></td></tr>
            <tr><td>14</td><td></td></tr>
            <tr><td>15</td><td></td></tr>
        </table>
      </div>
  

    </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________DISCURSIVA 4_________________ -->

    <!-- _______________GABARITO 1_________________ -->
    <section class="page">
      <header>
        <div class="logo"><img src="img/logo.png" alt="Faculdade de Ciências Médicas de Minas Gerais"/></div>
        <div class="qrcode"><?php echo '<img src='.$t.'>'; ?> </div>
        <div class="header-data">
          <dl class="dl-horizontal">
            <dt>Aluno</dt>
            <dd><?php ECHO $_POST['nome']." ".$cpf; ?></dd>
            <dt>Prova</dt>
            <dd>Simulado Anasem</dd>
          </dl>
          <dl class="dl-horizontal">
            <dt>Curso</dt>
            <dd>Graduação em Medicina</dd>
            <dt>Data</dt>
            <dd>15/10/2016</dd>
          </dl>
        </div>
      </header>
      
      <h1 class="text-center">Caderno de Respostas - Questões Objetivas</h1>
      <div class="page-content">
      
        <table class="form form-table name-table">
          <thead>
            <tr>
              <th><?php ECHO $nomes[$id]; ?></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </tbody>
          <tfoot>
            <tr>
              <td>Assine conforme documento apresentado</td>
            </tr>
          </tfoot>
        </table>
        
        <div class="gabarito-container">
          <table class="table table-bordered gabarito">
            <tr>
              <td>1</td>
              <td>
                  <span class="gabarito-item">A</span>
                  <span class="gabarito-item">B</span>
                  <span class="gabarito-item">C</span>
                  <span class="gabarito-item">D</span>
              </td>
              <td>31</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>32</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>3</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>33</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>4</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>34</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>5</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>35</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>6</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>36</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>7</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>37</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>8</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>38</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>9</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>39</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>10</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>40</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>11</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>41</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>12</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>42</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>13</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>43</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>14</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>44</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>15</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>45</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>16</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>46</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>17</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>47</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>18</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>48</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>19</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>49</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>20</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>50</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>21</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>51</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>22</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>52</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>23</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>53</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>24</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>54</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>25</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>55</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>26</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>56</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>27</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>57</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>28</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>58</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>29</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>59</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
            <tr>
              <td>30</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
              <td>60</td>
              <td>
                <span class="gabarito-item">A</span>
                <span class="gabarito-item">B</span>
                <span class="gabarito-item">C</span>
                <span class="gabarito-item">D</span>
              </td>
            </tr>
          </table>
        </div>

    </div><!--/page-content-->

      <footer>
        <p>CMMG - Página <span class="this-index"></span> de <span class="total-index"></span></p>
      </footer>
    </section>
    <!-- _______________GABARITO 1_________________ -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.jslatex.js"></script>
    <script type="text/JavaScript">
      $(function () {
        $(".latex").latex();
      });
      $(document).ready( function() {
        $(".page footer").each(function(index){
            var total = $('.page footer').length;
            $(this).find('.this-index').text(index + 1);
            $(this).find('.total-index').text(total);
        });
      });
    </script>
    <script type="text/JavaScript">
    function printDiv(divName)
    {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
    }
    printDiv('prova');
    </script>

  </body>
</html>


