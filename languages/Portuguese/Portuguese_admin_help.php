<?php
/**
 * Helpdesk plugin — Cadeias em português para o separador Guia (Fase 3b).
 */
if (!defined('e107_INIT')) { exit; }

// Títulos dos separadores
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_TITLE', 'Visão geral');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_TITLE', 'Papéis e permissões');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_TITLE', 'Ciclo do ticket');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_TITLE', 'Categorias');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_TITLE', 'Resoluções');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TITLE', 'Notificações');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_TITLE', 'Perguntas frequentes');

// Tab 0
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_HEADING', 'O que faz este plugin');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_LEAD', 'Um sistema de tickets / mesa de ajuda leve integrado com o seu site e107.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_BODY', 'Os membros abrem tickets, uma equipa técnica classifica e resolve, e o plugin regista cada passo (comentários, mudanças de estado, notificações) para auditoria. Todas as permissões são controladas por classes de utilizador do e107.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB0_TIP', 'Dica: antes de colocar o plugin em produção, defina pelo menos uma Categoria e uma Resolução — os tickets novos precisam de categoria e para fechar um é preciso uma resolução.');

// Tab 1
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_HEADING', 'Quem pode fazer o quê');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_INTRO', 'O acesso é concedido através de classes de utilizador do e107 configuradas nas preferências do plugin. Cada visitante recebe exactamente o papel que as suas classes permitem.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_ROLE', 'Papel');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_PREF', 'Preferência / coluna');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_COL_CAN', 'O que pode fazer');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_SUPER', 'Supervisor');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_SUPER_CAN', 'Vê todos os tickets, recebe notificações ao criar ou actualizar, pode reatribuir ou forçar o fecho.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_TECH', 'Técnico');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_TECH_CAN', 'Vê tickets das mesas cuja classe corresponda. Pode adicionar actualizações, alterar estado e escolher resolução.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_POST', 'Autor');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_POST_CAN', 'Pode abrir tickets novos e comentar nos próprios.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_READ', 'Leitor');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_ROLE_READ_CAN', 'Pode ver os tickets próprios; sem edição.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB1_SECURITY_NOTE', 'Segurança: deixar qualquer classe como Público (0) é tratado como erro — o plugin recorre a um valor seguro (Membros / Ninguém). Atribua sempre uma classe real a Autor e Supervisor.');

// Tab 2
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_HEADING', 'Ciclo de vida de um ticket');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP1', 'Um membro abre um ticket, escolhe categoria e prioridade.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP2', 'O plugin atribui-o à mesa dona da categoria, marca-o como <em>Aberto</em> e notifica a caixa e os técnicos.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP3', 'Um técnico assume-o, muda para <em>Em curso</em> e adiciona um comentário; o autor é notificado.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP4', 'O autor pode continuar a comentar até o técnico marcar como <em>Aguarda autor</em> ou <em>Resolvido</em>.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP5', 'Ao escolher uma resolução o ticket passa a <em>Fechado</em>. Continua consultável mas só de leitura.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_STEP6', 'Os supervisores podem reabrir um ticket fechado retirando a resolução.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_AUTOCLOSE', 'Fecho automático: se configurado, tickets resolvidos passam a Fechado após N dias sem actividade.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB2_ESCALATE', 'Escalação: a prioridade pode ser alterada a qualquer momento. Os supervisores recebem sempre notificação da mudança.');

// Tab 3
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_HEADING', 'Gestão de categorias');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_INTRO', 'As categorias descrevem <em>sobre o quê</em> é um ticket (p. ex. "Facturação", "Erro do site", "Questão geral"). Cada ticket pertence a exactamente uma categoria.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_AUTOASSIGN', 'Cada categoria aponta para uma mesa. Ao criar-se o ticket, o plugin atribui-o automaticamente a essa mesa, que define que classe técnica pode trabalhá-lo.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB3_LINK', 'Edite as categorias no separador <strong>Categorias</strong> do menu à esquerda.');

// Tab 4
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_HEADING', 'Gestão de resoluções');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_INTRO', 'As resoluções descrevem <em>como</em> um ticket terminou (p. ex. "Resolvido", "Duplicado", "Não será resolvido", "Cancelado pelo utilizador").');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_CLOSING', 'Um ticket não pode ser fechado sem escolher uma resolução; assim os relatórios ficam limpos e as estatísticas por resolução são úteis.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB4_LINK', 'Edite a lista no separador <strong>Resoluções</strong> do menu à esquerda.');

// Tab 5
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_HEADING', 'Notificações');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_INTRO', 'Por omissão há três canais de notificação:');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_USER', 'O autor: recebe aviso ao actualizar o ticket, adicionar comentário ou fechar.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_HELPDESK', 'A caixa da mesa: recebe todos os tickets atribuídos.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TECH', 'Técnicos: recebem cópia quando chega um ticket à sua mesa.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_PMNOTE', 'Se o plugin de Mensagens Privadas estiver instalado, as notificações podem ser entregues como MP internas em vez de email.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB5_TEMPLATES', 'Pode personalizar cada mensagem no separador <strong>Correio</strong>.');

// Tab 6
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_HEADING', 'Perguntas frequentes');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q1', 'Porque é que um técnico vê tickets que não são seus?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A1', 'Verifique <code>hdudesk_class</code> da mesa: se estiver em Todos / Público, qualquer membro da classe autora vai vê-los. Atribua uma classe técnica adequada.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q2', 'Porque é que os membros não recebem notificações por email?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A2', 'Verifique a configuração de email do site, depois se as preferências "Notificar ao criar/actualizar" estão activas e se o endereço da caixa é válido.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q3', 'Posso exportar tickets?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A3', 'Sim: na vista pública do ticket use o botão "PDF" (baseado em TCPDF). A exportação CSV está no roadmap.');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_Q4', 'Como actualizo o plugin?');
define('LAN_PLUGIN_HELPDESK_GUIDE_TAB6_A4', 'Copie os ficheiros novos sobre a pasta do plugin e execute a actualização no <em>Gestor de plugins</em>. As migrações de tabela correm idempotentemente em <code>helpdesk_setup.php::upgrade_post()</code>.');
