# ejuri
Sistema de julgamento de processos judiciais

## Tecnologias
- Php7 (Pdo)
- Mysql8
- Uikit3

### Admin
- Advogado ✔
    - listarAdvogados (ativos/inativos) ✔
    - addAdvogado ✔
    - ativar/inativarAdvogado ✔
- Juíz ✔
    - listarJuizes (ativos/inativos) ✔
    - addJuiz ✔
    - ativar/inativarJuiz ✔

### Advogado
- edAdvogado ✔
- Cliente
    - listarClientes ✔
    - addCliente ✔
    - edCliente
    - ativar/inativarCliente ✔
- Processo
    - listarProcessos (andamento,deferidos,indeferidos,cancelados) ✔
    - addProcesso ✔
    - verProcesso ✔
    - edProcesso
    - cancelarProcesso ✔
    - imprimirProcesso ✔

### Juíz
- edJuiz
- Processo
    - listarProcessos (pendentes,deferidos,indeferidos,cancelados)
    - imprimirProcesso
    - deferir/indeferirProcesso