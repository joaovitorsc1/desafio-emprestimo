# Resolução Desafio Empréstimo
Olá rede hoje irei publicar minha resolução do desafio "desafio-empréstimo" de [https://github.com/backend-br/desafios/blob/master/loans/PROBLEM.md).

------------
Vamos a alguns pontos de regras citados no desafio.
Temos 3 tipos de empréstimos dentre eles:
- Empréstimo pessoal: Taxa de juros de 4%.
- Empréstimo consignado: Taxa de juros de 2%.
- Empréstimo com garantia: Taxa de juros de 3%.

------------

A solicitação desses supostos empréstimos são validados pelos seguintes requisitos.

- Idade
- Salário
- Localização

Sendo assim iremos receber uma solicitação do tipo POST em nosso server contendo os seguinte parâmetros em si.

```json
{
  "age": 26,
  "cpf": "275.484.389-23",
  "name": "Vuxaywua Zukiagou",
  "income": 7000.00,
  "location": "SP"
}
```
onde deve retornar o conteudo contendo o nome do solicitante e empréstimos a qual ele tem acesso.

```json
{
  "customer": "Vuxaywua Zukiagou",
  "loans": [
    {
      "type": "PERSONAL",
      "interest_rate": 4
    },
    {
      "type": "GUARANTEED",
      "interest_rate": 3
    },
    {
      "type": "CONSIGNMENT",
      "interest_rate": 2
    }
  ]
}
```

------------

# Requisitos para regra de acesso aos empréstimos 
- Conceder o empréstimo pessoal se o salário do cliente for igual ou inferior a R$ 3000.

- Conceder o empréstimo pessoal se o salário do cliente estiver entre R$ 3000 e R$ 5000, se o cliente tiver menos de 30 anos e residir em São Paulo (SP).

- Conceder o empréstimo consignado se o salário do cliente for igual ou superior a R$ 5000.

- Conceder o empréstimo com garantia se o salário do cliente for igual ou inferior a R$ 3000.

- Conceder o empréstimo com garantia se o salário do cliente estiver entre R$ 3000 e R$ 5000, se o cliente tiver menos de 30 anos e residir em São Paulo (SP).

Sendo assim então temos o seguinte diagrama.
[![](https://i.postimg.cc/TPLt29rw/untitled.png)](https://i.postimg.cc/TPLt29rw/untitled.png)
