<H1>💻📊 FMUinvest</H1> 
É uma aplicação web robusta voltada para a simulação de investimentos, que possibilita aos usuários o cadastro seguro de suas informações pessoais e financeiras, bem como a visualização de saldos simulados. O sistema utiliza um banco de dados MySQL para garantir o armazenamento eficiente e estruturado dos dados, oferecendo uma plataforma confiável para estudo e análise de estratégias de investimento.

<strong>Visão Geral dos Componentes:</strong>

![image](https://github.com/user-attachments/assets/d1eaa005-e81c-42c7-a34c-cbe65cc33575)

<h2>🗂️ Diagrama do Banco de Dados (phpMyAdmin)</h2>
<h3>Esta imagem apresenta a estrutura do banco de dados MySQL utilizado no projeto, gerenciado por meio do phpMyAdmin. O banco contém as seguintes tabelas principais:</h3>

• invest_pessoa: Armazena informações básicas dos usuários, incluindo o identificador único id_pessoa (chave primária) e o nome do usuário.

• invest_saldo: Contém os dados do saldo simulado de cada usuário. Inclui id_saldo (chave primária), id_pessoa (chave estrangeira referenciando a tabela invest_pessoa) e o valor do saldo (valor_saldo). Essa estrutura permite associar um saldo específico a cada pessoa.

• invest_cadastro: Guarda dados relacionados ao cadastro dos usuários, como id_cadastro (chave primária), id_pessoa (chave estrangeira), e informações de login, como cad_email e nmu_senha.

![image](https://github.com/user-attachments/assets/49b574e5-b790-4b4b-876c-04899e395c6d)

<h2>🔌📝 Código PHP - Conexão e Inserção de Dados</h2>
<h3>Este trecho de código PHP exemplifica a lógica para estabelecer conexão com o banco de dados e inserir um novo usuário:</h3>

• Inicialmente, realiza a conexão com o banco MySQL utilizando as variáveis de configuração $hostname, $usuario, $senha e $bancodedados.

• Verifica se o formulário foi submetido ($_POST['submit']).

• Extrai os dados do formulário, como nome ($_POST['nome']), email ($_POST['email']) e senha ($_POST['password']).

• Executa duas consultas SQL:

• A primeira insere o nome do usuário na tabela invest_pessoa.

• A segunda insere os dados de cadastro, incluindo o id_pessoa gerado na primeira inserção, além do email e senha, na tabela invest_cadastro.

• Após a inserção bem-sucedida nas duas tabelas, uma mensagem de sucesso é exibida; caso contrário, mensagens de erro são apresentadas para facilitar a identificação de falhas.

![image](https://github.com/user-attachments/assets/6940b97b-9cdd-4287-b981-fffc990b287e)

<h2>🔐 Código PHP - Validação de Login</h2>
<h3>Este script é responsável pela autenticação dos usuários na aplicação:</h3>

• Importa o arquivo de conexão com o banco (conexao.php).

• Verifica se os campos de e-mail e senha foram preenchidos no formulário ($_POST['email'] e $_POST['password']). Se algum campo estiver vazio, redireciona o usuário para a página inicial (index.html).

• Sanitiza e armazena os valores do e-mail e senha em variáveis.

• Executa uma consulta SQL para verificar se existe um registro na tabela invest_cadastro que corresponda ao e-mail e senha fornecidos.

• Se um usuário válido for encontrado, inicia uma sessão (session_start()), armazena o identificador do cadastro ($_SESSION['id_cadastro']) e redireciona para a página principal autenticada (leadingpage.html).

• Caso contrário, redireciona para a página inicial exibindo uma mensagem de erro indicando que o e-mail ou senha estão incorretos.
