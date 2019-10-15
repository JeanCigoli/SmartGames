# SmartGames - Processo Seletivo

> Projeto voltado para o processo seletivo da PRIMI.

O desafio era criar uma área no site da Smart Games para os clientes consultarem os jogos
de seu interesse.
Quando o usuário selecionar um dos jogos, o sistema deve apresentar os
detalhes do produto e as lojas com disponibilidade para venda. Quando
selecionar a loja deve apresentar a localização no mapa.

A ideia da solução é que haja uma integração entre às duas plataformas, web
e mobile, e tenha interação com Banco de Dados.

## Para Utilizar

Para o funcionamento do projeto é necessário tomar alguns cuidados:

* Colocar o projeto web no apache para funcionar;

* Depois que colocar copiar o link até a primeira barra depois de SmartGames;

![](/gif/gifUrl.gif)

* Voce irá colar esse link em 3 classes da aplicação Mobile, trocando o localhost por **http://10.0.2.2**.

    1. Na classe do RetrofitConfig;

    ![](/gif/1.png)

    2. Na classe do RecyclerViewAdapter, dentro do método onBindViewHolder;

    ![](/gif/2.png)

    3. Na classe InformacoesActivity;

    ![](/gif/3.png)

* Assim o projeto estará funcionando;

## Linguagens e Ferramentas Utilizadas

No banco de Dados foi utilizado o SGDB MySql.

No Mobile foi utilizado:

* o Android Studio como IDE;
* JAVA para criação do aplicativo;
* Retrofit para comunicação com o banco por api;

* Obs.: Não foi criado a interação com o Maps, o google atualmente pede cadastro de cartão para utilizar as suas api. Por escolhas a aplicação Mobile está sem, o Web estará funcionado.

E o resultado foi:

![](/gif/gifApp.gif)

No Web foi utilizado:

* PHP para interação com o servidor;
* JavaScript: utlizando o Ajax e para fins de efeitos;
* HTML e CSS para estrutura (Sem auxilio de Framework).

E o resultado foi:

![](/gif/gifWeb.gif)

Foi criado também um área para pesquisar jogos:

![](/gif/gifBusca.gif)


# 

Criado em 14/10/2019.

Jean Cigoli de Almeida