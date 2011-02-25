--
-- Módulo CobreDireto para OsCommerce 2.2RC2a
-- Versão 1.1.1
--

Após descompactados os arquivos do módulo, copie os arquivos necessários para as pastas
específicas do OsCommerce.

/catalog/includes/modules/payment/cobredireto_payment.php
/catalog/includes/modules/payment/cobredireto/pagamento.php
/catalog/includes/modules/payment/cobredireto/retorno.php
/catalog/includes/modules/payment/cobredireto/CD_config.php

Onde, /catalog é o caminho raiz de sua instalação do OsCommerce. Também deve ser incluído o arquivo de linguagem.

/catalog/includes/languages/english/modules/payment/cobredireto_payment.php

Note que, o módulo foi escrito para aparecer na instalação padrão do OsCommerce mesmo que escrito em português brasileiro. Caso você tenha a instalação de sua loja em outra língua, basta trocar o caminho em "english" para "português" ou a língua desejada.

Feito isso, o módulo de pagamento aparecerá na administração do sistema. Vá à opção "Modules > Payment" e instale o módulo "Cobre Direto". Agora, edite as configurações com seu usuário e senha de sua conta CobreDireto. O cálculo do frete se dará com base no cálculo do próprio CobreDireto.


--
-- Changelog da versão 1.1.3
--
Limpando o carrinho após o processo de checkout, mesmo que a compra esteja pendente.

--
-- Changelog da versão 1.0.2
--
Acertando a tradução de textos no painel

--
-- Changelog da versão 1.0.1
--
Adicionado feature de formas de pagamento.

--
-- Changelog da versão 1.0
--
Fix para o envio do telefone sem DDD.

