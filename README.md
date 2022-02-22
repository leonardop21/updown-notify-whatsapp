# WPP Notification - Updown.io

#### Livre para ser baixado, utilizado e alterado.


Seja notificado no WhatsApp caso algum site monitorado no Updown.io fique fora do ar

### Crie uma conta no UPDOWN

[https://bit.ly/3IlDSdD](https://bit.ly/3IlDSdD)


#### Rodando localmente
Clone o projeto

```
git clone https://github.com/leonardop21/updown-notify-whatsapp
```
Entre no diretório do projeto

```
cd updown-notify-whatsapp
```
Instale as dependências
```
  composer install
```

No arquivo ``` /public/callback ``` defina uma key para controle próprio ex: ``` Afwe14we555d1230we23sdx ```

No arquivo ``` /services/WppInfo``` preencha os dados para receber notificações no WhatsApp

No Updown.io insira a sua url de callback junto com a key que definiu, ex: ``` https://meusite.com.br/callback?key=Afwe14we555d1230we23sdx ```


Para ser notificado no WhatsApp é necessário ter instalado e configurado o wppconnect-server 
``` https://github.com/wppconnect-team/wppconnect-server ```

Pronto, divirta-se!

### Testando a aplicação

Criei um subdomínio de teste e inseri no updown.io. 

No monento em que o site ficou fora do ar, recebi um aviso no WhatsApp, quando voltou ao normal, recebi outro aviso.



## Screenshots

#### Site indisponível
![App Screenshot](https://i.imgur.com/Xdc6WF9.png)

### Aviso no WhatsApp

![App Screenshot](https://i.imgur.com/CcrDh08.jpg)

### Site disponível

![App Screenshot](https://i.imgur.com/7dJNq52.png)

### Aviso no WhatsApp

![App Screenshot](https://i.imgur.com/s3p0Cxu.jpg)

