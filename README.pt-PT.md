# 🎫 Helpdesk Plugin para e107 CMS

> **Sistema de tickets de suporte para e107 v2.3+**

![Version](https://img.shields.io/badge/version-2.0.1-blue)
![e107](https://img.shields.io/badge/e107-2.3%2B-green)
![PHP](https://img.shields.io/badge/PHP-8.0%2B-purple)
![License](https://img.shields.io/badge/license-GPL--2.0%2B-orange)

#### Escolha o idioma / Choose your language / Elija su idioma

[![Language-English](https://img.shields.io/badge/Language-English-blue)](README.md)
[![Language-Português](https://img.shields.io/badge/Language-Português-green)](README.pt-PT.md)
[![Language-Español](https://img.shields.io/badge/Language-Español-red)](README.es-ES.md)

---

## ✨ Novidades na 2.0.1

Release "ponte" que **desbloqueia a instalação** em e107 2.3.x / PHP 8:

- Removida a dependência obrigatória de `bootstrap_colorpicker`. O plugin
  instala num e107 recém-instalado sem plugins de terceiros.
- Corrigidos os warnings `Undefined variable` do PHP 8 em `helpdesk.php`.
- Corrigido bug de sessão: a mensagem flash sobrescrevia o filtro activo da
  lista de tickets.

Não altera o esquema da BD nem os prefs — **não requer migração**.

Ver [`CHANGELOG.md`](CHANGELOG.md) para o detalhe e [`MIGRATION_PLAN.md`](MIGRATION_PLAN.md)
para o roadmap até 2.4.x.

---

## 📋 Descrição

O Helpdesk permite aos utilizadores do seu site e107 **abrir tickets de
suporte**, acompanhar o estado, comentar — e do lado do staff — atribuir
técnicos, mudar prioridade, aplicar fixes com custo, fechar e exportar o
histórico em PDF.

Autor original: **Father Barry** (2004-2009). Fork atual mantido neste
repositório para modernização (PHP 8, segurança, `e_admin_ui`, Bootstrap 5,
padrão de 4 camadas).

---

## 🧩 Requisitos

- **e107** ≥ 2.3.1
- **PHP** ≥ 8.0 (testado com 8.3)
- **MySQL / MariaDB** com InnoDB
- Composer (para as dependências do core do e107, não do próprio plugin)

---

## 🚀 Instalação

1. Copie a pasta `helpdesk/` para `e107_plugins/` da sua instalação.
2. Em Admin → **Plugin Manager**, localize *Help Desk* → **Install**.
   O instalador cria automaticamente as tabelas `hdu_tickets` (⚠️ até à
   v2.0.1 ainda se chama `hdunit`; renomeada na v2.1.0), `hdu_helpdesk`,
   `hdu_comments`, `hdu_categories`, `hdu_fixes`, `hdu_resolve` com o prefixo
   configurado (`MPREFIX`).
3. Vá a Admin → **Helpdesk** → **Configure** e ajuste:
   - **Supervisor class** (default `main admin`): pode ver/fechar todos os
     tickets.
   - **Post class**: quem pode abrir tickets.
   - **User class**: quem pode ler.
   - Prefs de emails, PM, cores de prioridade, escalonamento e auto-fecho.
4. Crie pelo menos **1 helpdesk** (mesa), **1 categoria** e **1 resolução** —
   são obrigatórios no formulário de novo ticket.
5. Adicione `helpdesk_menu` à posição de menu desejada em
   Admin → **Menus**.

---

## 🗄️ Modelo de dados (resumo)

| Tabela | Descrição |
|---|---|
| `hdunit` (→ `hdu_tickets` na 2.1.0) | Tickets (assunto, descrição, prioridade, técnico, custos, estado). |
| `hdu_helpdesk` | Mesas de suporte — cada uma com a sua userclass de técnicos e email. |
| `hdu_categories` | Categorias por helpdesk. |
| `hdu_resolve` | Estados / resoluções (Aberto, Fechado, Duplicado, …). |
| `hdu_fixes` | Fixes reutilizáveis com custo. |
| `hdu_comments` | Fio de comentários de cada ticket. |

Definições completas em `helpdesk_sql.php`.

---

## 👥 Papéis

| Papel | Permissão e107 | Pode |
|---|---|---|
| **Admin** | `getperms("P")` | Tudo, incluindo configuração. |
| **Supervisor** | userclass `hduprefs_supervisorclass` | Ver todos os tickets, atribuir, fechar, editar. |
| **Técnico** | userclass do helpdesk (`hdudesk_class`) | Ver e actualizar tickets do helpdesk atribuído. |
| **Postador** | userclass `hduprefs_postclass` | Abrir tickets. |
| **Leitor** | userclass `hduprefs_userclass` | Ver os seus próprios tickets. |

---

## 🗺️ Roadmap

Segue as fases numeradas de [`MIGRATION_PLAN.md`](MIGRATION_PLAN.md):

| Fase | Versão | Conteúdo |
|---|---|---|
| 0 ✅ | 2.0.1 | Arranque, fix PHP 8, remover dep `bootstrap_colorpicker`. |
| 1 | 2.1.0 | Estabilização PHP 8 (typed props), rename `hdunit`→`hdu_tickets`. |
| 2 | 2.2.0 | Segurança: SQL com placeholders, CSRF, sanitização. |
| 3 | 2.3.0 | Admin migrado para `e_admin_ui` (CRUD categorias, resoluções, fixes, helpdesks). |
| 3b | 2.4.0 | Separadores **Guide** + **About** com padrão 4-camadas, locale ES adicionado. |
| 4 | 2.5.0 | Frontend Bootstrap 5. |
| 5 | 2.6.0 | URLs SEO amigáveis (`/helpdesk/ticket/{id}`). |
| 6 | 2.7.0 | Notificações via `e_notify` + `e_cron` para auto-fecho / escalonamento. |
| 7 | 2.8.0 | Anexos, auditoria, SLA, widget dashboard, REST API, FAQ a partir de tickets. |
| 8 | 2.9.0 | Testes unitários + Codeception + CI. |

---

## 📚 Documentação

- [`CHANGELOG.md`](CHANGELOG.md) — histórico de versões.
- [`DEV_NOTES.md`](DEV_NOTES.md) — decisões arquitectónicas.
- [`MIGRATION_PLAN.md`](MIGRATION_PLAN.md) — roadmap detalhado.
- [`GUIA_DESARROLLO_PLUGINS_E107.md`](GUIA_DESARROLLO_PLUGINS_E107.md) — guia
  canónica de plugins e107 (referência embebida).
- [`docs/MANUAL_UTILIZADOR_PT.md`](docs/MANUAL_UTILIZADOR_PT.md) — manual do
  utilizador final (PT).

---

## 🙌 Créditos

- **Autor original**: Father Barry (2004-2009).
- **Fork e modernização actual**: mantenedores deste repositório.
- Baseado nas convenções publicadas por
  [e107inc/e107](https://github.com/e107inc/e107) e no padrão de 4 camadas
  documentado em `GUIA_DESARROLLO_PLUGINS_E107.md`.

---

## 📄 Licença

GPL v2 ou posterior, alinhada com e107. Ver cabeçalhos dos ficheiros PHP.
