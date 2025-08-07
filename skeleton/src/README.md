# Front Consig Web Application Template

## Overview

Este template tem como objetivo servir de base para o start de aplicações web Laravel do projeto Front Consig do grupo Akrk. Suas principais tecnologias são Laravel 11 e Composer 2.7.

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

- **Imagem Docker**: O projeto está containerizado rodando PHP 8.3, Nginx e Supervisor em uma imagem PHP-FPM-8.3.
- **CI/CD**: Configurado com duas pipelines:
  - **Build**: Realiza o build da imagem Docker e faz o push para o repositório da AWS (ECR).
  - **Deploy**: Faz o deploy da imagem em um cluster serverless do tipo Fargate, com serviço de load balancing e autoscaling.
- **Fluxo de Código**:
  - **Routes** -> **Middleware** -> **Controller** -> **Actions** -> **Repository**
  - Toda a regra de negócio está contida nas actions.

## Configuração de Banco de Dados

- **Migrations**: Todas as migrations estão atualizadas para a criação dos bancos de dados que serão utilizados.
- **Models**: Todos os models relacionados a cada entidade estão incluídos.

## Modo de Uso - Ambiente Local

### Pré-requisitos

- Docker instalado.

### Passos para Inicialização

1. Clone o repositório do GitHub:
   ```sh
   git clone https://github.com/TeckSolucoes/front-consig-microservices-template.git
   ```

2. Rodando o Projeto
   ```sh
   docker-compose up --build
   ```

## NOTAS

1. ### Conexão com o Banco de Dados.
    Certifique-se de que o banco de dados está configurado corretamente e que as variáveis de ambiente estão definidas no arquivo .env.

2. Mantenha o código bem documentado e organizado para facilitar a manutenção e evolução do projeto.

3. Utilize o fluxo de código recomendado para garantir a consistência e qualidade do desenvolvimento.

4. Este documento serve como uma referência técnica para a configuração e utilização do template de aplicação web Laravel para o projeto Front Consig do grupo Akrk.

## Se precisar de mais alguma alteração ou adição, por favor, avise!
