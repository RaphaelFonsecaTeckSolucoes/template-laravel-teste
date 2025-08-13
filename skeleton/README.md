# [Título do Projeto]

Uma descrição breve e clara do projeto, seu propósito e o problema que ele resolve.

## Tecnologias Utilizadas

- **PHP 8.3**
- **Laravel 11**
- **Composer 2.7**
- **Nginx**
- **Supervisor**
- **Docker**
- **AWS ECR**
- **AWS Fargate**
- **CI/CD**

## Arquitetura e Fluxo de Código

Este projeto é containerizado usando Docker, rodando PHP 8.3, Nginx e Supervisor em uma única imagem PHP-FPM-8.3.

### CI/CD

O projeto está configurado com duas pipelines:
- **Build**: Constrói a imagem Docker e a envia para o repositório do AWS ECR.
- **Deploy**: Implanta a imagem em um cluster serverless Fargate, com serviços de load balancing e autoscaling.

### Fluxo de Código

Para manter a consistência e a qualidade do código, o seguinte fluxo é recomendado:

**Routes** -> **Middleware** -> **Controller** -> **Actions** -> **Repository**

Toda a lógica de negócio deve estar contida nas `Actions`.

## Começando (Ambiente Local)

### Pré-requisitos

- [Docker](https://www.docker.com/get-started) instalado na sua máquina.

### Instruções de Setup

1.  **Clonar o repositório:**
    ```sh
    git clone [URL_DO_REPOSITORIO]
    cd [NOME_DA_PASTA_DO_PROJETO]
    ```

2.  **Criar o arquivo de ambiente:**
    Copie o arquivo `.env.example` localizado no diretório `src/` e renomeie-o para `.env`.
    ```sh
    cp src/.env.example src/.env
    ```
    Atualize as variáveis no arquivo `src/.env` com sua configuração local, especialmente os detalhes de conexão com o banco de dados.

3.  **Construir e rodar os containers:**
    ```sh
    docker-compose up --build -d
    ```

4.  **Gerar a chave da aplicação:**
    Entre no container e rode o comando artisan para gerar a chave.
    ```sh
    docker-compose exec php-nginx php artisan key:generate
    ```

A aplicação deve estar acessível em [http://localhost:8080](http://localhost:8080).

## Testes

Para rodar os testes automatizados do projeto, execute o seguinte comando:

```sh
docker-compose exec php-nginx php artisan test
```

## Documentação

A documentação do projeto é gerada usando [MkDocs](https://www.mkdocs.org/). Os arquivos-fonte estão no diretório `docs/`.

Para visualizar a documentação localmente, pode ser necessário instalar o MkDocs e executá-lo, ou verificar se ele está integrado ao processo de build do projeto.

## Notas

- Certifique-se de que o banco de dados está configurado corretamente e que as variáveis de ambiente estão definidas no arquivo `.env`.
- Mantenha o código bem documentado e organizado para facilitar a manutenção e evolução do projeto.
- Siga o fluxo de código recomendado para garantir a consistência e qualidade do desenvolvimento.
