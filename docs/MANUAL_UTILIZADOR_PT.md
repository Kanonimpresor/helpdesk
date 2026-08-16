# 📅 Booking Plugin para e107 CMS — Manual do Utilizador

**Versão:** 2.3.0  
**Data:** Março 2026  
**Autor:** LandingPro — Martin Costa  
**Licença:** GPL v2+  
**Idioma deste documento:** Português (Portugal)

---

## Índice Geral

| Capítulo | Secção | Página |
|---|---|---|
| 1 | [Introdução e Requisitos](#1-introdução-e-requisitos) | 4 |
| 2 | [Instalação do Plugin](#2-instalação-do-plugin) | 6 |
| 3 | [Visão Geral do Painel de Administração](#3-visão-geral-do-painel-de-administração) | 8 |
| 4 | [Configuração Geral (Base)](#4-configuração-geral-base) | 10 |
| 5 | [Tipos de Evento](#5-tipos-de-evento) | 14 |
| 6 | [Anfitriões (Hosts)](#6-anfitriões-hosts) | 18 |
| 7 | [Horários por Dia (Day Schedules)](#7-horários-por-dia-day-schedules) | 22 |
| 8 | [Disponibilidade e Bloqueios](#8-disponibilidade-e-bloqueios) | 25 |
| 9 | [Gestão de Reservas](#9-gestão-de-reservas) | 28 |
| 10 | [Pagamentos Online](#10-pagamentos-online) | 32 |
| 11 | [Cupões de Desconto](#11-cupões-de-desconto) | 38 |
| 12 | [Créditos de Sessão](#12-créditos-de-sessão) | 41 |
| 13 | [Campos Personalizados](#13-campos-personalizados) | 44 |
| 14 | [SEO e Dados Estruturados](#14-seo-e-dados-estruturados) | 47 |
| 15 | [Avaliações e Classificações (Reviews)](#15-avaliações-e-classificações-reviews) | 51 |
| 16 | [Integração Google Calendar + Meet](#16-integração-google-calendar--meet) | 54 |
| 17 | [Integração Zoom Meetings](#17-integração-zoom-meetings) | 59 |
| 18 | [Notificações SMS](#18-notificações-sms) | 63 |
| 19 | [Notificações WhatsApp](#19-notificações-whatsapp) | 67 |
| 20 | [Lembretes Automáticos (Reminders)](#20-lembretes-automáticos-reminders) | 71 |
| 21 | [Widget Embebível (Embed)](#21-widget-embebível-embed) | 73 |
| 22 | [Webhooks](#22-webhooks) | 76 |
| 23 | [API REST](#23-api-rest) | 79 |
| 24 | [Dashboard e Estatísticas](#24-dashboard-e-estatísticas) | 83 |
| 25 | [Exportação PDF / Excel](#25-exportação-pdf--excel) | 86 |
| 26 | [Modo Escuro (Dark Mode)](#26-modo-escuro-dark-mode) | 88 |
| 27 | [Suporte Multi-Idioma](#27-suporte-multi-idioma) | 89 |
| 28 | [Guia do Utilizador Integrado](#28-guia-do-utilizador-integrado) | 91 |
| 29 | [Resolução de Problemas (Troubleshooting)](#29-resolução-de-problemas-troubleshooting) | 92 |
| 30 | [Plano de Implementação Recomendado](#30-plano-de-implementação-recomendado) | 95 |
| A | [Referência Rápida — Todas as Funcionalidades](#apêndice-a--referência-rápida--todas-as-funcionalidades) | 98 |
| B | [Mapa de Prioridades](#apêndice-b--mapa-de-prioridades) | 101 |
| C | [Checklist de Testes Finais](#apêndice-c--checklist-de-testes-finais) | 103 |

---

<div style="page-break-after: always;"></div>

# 1. Introdução e Requisitos

## 1.1 O que é o Booking Plugin?

O **Booking** é um plugin profissional de agendamento e reservas para o CMS **e107 v2.3.x**. Permite que os visitantes do seu website marquem consultas, sessões, aulas ou reuniões diretamente a partir do site — sem depender de serviços externos como Calendly ou Acuity.

### Para quem é indicado?

| Setor | Exemplos de uso |
|---|---|
| 🏥 Saúde | Psicólogos, terapeutas, nutricionistas |
| 🎓 Educação | Explicadores, academias, escolas de línguas |
| 💼 Consultoria | Consultores, advogados, contabilistas |
| 💇 Beleza | Salões de cabeleireiro, spas, estética |
| 🏋️ Fitness | Ginásios, personal trainers, yoga |
| 💻 Tecnologia | Demos de produto, suporte técnico agendado |
| 🎵 Artes | Professores de música, workshops |

### Principais vantagens

- ✅ **Dados no seu servidor** — sem dependência de terceiros
- ✅ **Totalmente integrado** com o e107 (utilizadores, temas, menus)
- ✅ **3 idiomas incluídos** — Inglês, Espanhol, Português
- ✅ **Pagamentos** — PayPal, Stripe, Eupago (MBWay, Multibanco, Cartão)
- ✅ **Videoconferência** — Google Meet e Zoom automáticos
- ✅ **Notificações** — Email, SMS, WhatsApp
- ✅ **SEO** — Schema.org JSON-LD para motores de busca
- ✅ **100% responsivo** — Bootstrap 5

## 1.2 Requisitos do Sistema

| Componente | Versão mínima | Recomendado |
|---|---|---|
| e107 CMS | 2.3.1 | 2.3.x mais recente |
| PHP | 8.0 | 8.2+ |
| MySQL / MariaDB | 5.7 / 10.3 | 8.0+ / 10.6+ |
| Motor de tabelas | InnoDB | InnoDB |
| Tema Bootstrap | 5.x | 5.3+ |
| Extensões PHP | `pdo_mysql`, `json`, `mbstring`, `curl` | Todas ativas |

> **Nota:** Para utilizar pagamentos online, é necessário um certificado SSL (https).

<!-- 📸 IMAGEM SUGERIDA: Screenshot da página de informação do sistema do e107 (Admin → About → System Info), mostrando versão PHP e MySQL. -->
> ![Requisitos do Sistema](#)  
> *Figura 1.1 — Verificação dos requisitos do sistema no e107 Admin.*

<div style="page-break-after: always;"></div>

# 2. Instalação do Plugin

## 2.1 Método 1 — Via Painel de Administração (Recomendado)

1. Descarregue o ficheiro `.zip` do plugin a partir do repositório GitHub:  
   `https://github.com/Kanonimpresor/booking/releases`

2. No e107, aceda a **Admin → Plugin Manager**

3. Clique em **Upload Plugin** e selecione o ficheiro `.zip`

4. Após o carregamento, localize **Booking** na lista de plugins

5. Clique em **Install**

6. O plugin cria automaticamente **11 tabelas** na base de dados

<!-- 📸 IMAGEM SUGERIDA: Screenshot do Plugin Manager do e107 com o Booking na lista, botão "Install" visível. -->
> ![Plugin Manager](#)  
> *Figura 2.1 — Plugin Manager do e107 com o Booking pronto para instalar.*

## 2.2 Método 2 — Via FTP / Upload Manual

1. Extraia o conteúdo do `.zip`

2. Carregue a pasta `booking/` para:  
   ```
   e107_plugins/booking/
   ```

3. No e107, aceda a **Admin → Plugin Manager**

4. Clique em **Scan for new plugins** (se necessário)

5. Localize **Booking** e clique em **Install**

## 2.3 Verificação da Instalação

Após a instalação, verifique:

- ✅ O menu **Booking** aparece no painel de administração
- ✅ Existem 11 tabelas com o prefixo `e107_booking_*` na base de dados
- ✅ A página frontend `/booking/` está acessível

### Tabelas criadas

| Tabela | Finalidade |
|---|---|
| `booking_config` | Configurações chave/valor |
| `booking_reservations` | Reservas dos visitantes |
| `booking_blocked` | Datas/horários bloqueados |
| `booking_hosts` | Anfitriões/profissionais |
| `booking_event_types` | Tipos de evento/serviço |
| `booking_day_schedules` | Horários por dia da semana |
| `booking_coupons` | Cupões de desconto |
| `booking_webhooks` | Configurações de webhooks |
| `booking_custom_fields` | Campos personalizados do formulário |
| `booking_credits` | Créditos de sessão pré-pagos |
| `booking_reviews` | Avaliações e classificações |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do phpMyAdmin mostrando as 11 tabelas booking_*. -->
> ![Tabelas da Base de Dados](#)  
> *Figura 2.2 — 11 tabelas criadas automaticamente na base de dados.*

<div style="page-break-after: always;"></div>

# 3. Visão Geral do Painel de Administração

O painel de administração do Booking está organizado num menu lateral com as seguintes secções:

| Ícone | Secção | Função |
|---|---|---|
| 📊 | **Dashboard** | Estatísticas visuais com gráficos Chart.js |
| 📅 | **Reservas** | Lista, filtro, edição e gestão de todas as reservas |
| ➕ | **Criar** | Formulário rápido para criar uma reserva manual |
| ⚙️ | **Configuração** | Definições gerais, pagamentos, SEO, integrações |
| 🚫 | **Disponibilidade** | Bloquear datas e horários específicos |
| 🕐 | **Horários por Dia** | Configurar horários diferentes por dia da semana |
| 👥 | **Anfitriões** | Gerir profissionais/membros da equipa |
| 🏷️ | **Tipos de Evento** | Configurar serviços com duração, preço e cor |
| 🎫 | **Cupões** | Gerir códigos de desconto |
| 🪙 | **Créditos** | Pacotes de sessões pré-pagos |
| ⭐ | **Avaliações** | Gerir classificações dos clientes |
| 🔌 | **Webhooks** | Configurar callbacks HTTP |
| 🔗 | **API** | Chave de API e documentação REST |
| 🪟 | **Embed** | Widget embebível para sites externos |
| 📝 | **Campos Personalizados** | Perguntas adicionais no formulário |
| 📖 | **Guia** | Manual do utilizador integrado |

<!-- 📸 IMAGEM SUGERIDA: Screenshot completo do painel de admin do Booking, mostrando o menu lateral com todos os itens acima. -->
> ![Painel de Administração](#)  
> *Figura 3.1 — Menu lateral do Booking no painel de administração do e107.*

### Fluxo de trabalho recomendado (primeira configuração)

```
Configuração Geral → Tipos de Evento → Anfitriões → Horários → Disponibilidade → Testar Frontend
```

<div style="page-break-after: always;"></div>

# 4. Configuração Geral (Base)

**Caminho:** Admin → Booking → Configuração → Separador "Base"

Este é o primeiro separador de configuração e contém as opções fundamentais do plugin.

## 4.1 Informações do Evento

| Campo | Descrição | Exemplo |
|---|---|---|
| **Título do Evento** | Nome exibido no calendário e nos emails | `Sessão de Admissão` |
| **Descrição do Evento** | Texto descritivo mostrado no frontend | `Sessão gratuita de 30 minutos...` |
| **Duração** | Texto informativo da duração | `30 minutos` |
| **Plataforma** | Onde decorre a sessão | `Zoom`, `Presencial`, `Google Meet` |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do separador "Base" da configuração, campos de informações do evento preenchidos. -->
> ![Configuração Base — Evento](#)  
> *Figura 4.1 — Configuração das informações do evento.*

## 4.2 Disponibilidade e Horários

| Campo | Descrição | Valor por defeito |
|---|---|---|
| **Dias Disponíveis** | Dias da semana em que aceita reservas | `Seg, Ter, Qua, Qui` |
| **Hora de Início** | Início do período de marcações | `09:00` |
| **Hora de Fim** | Fim do período de marcações | `18:00` |
| **Duração do Slot** | Comprimento de cada faixa horária (minutos) | `30` |
| **Antecedência mínima** | Horas de antecedência para marcar | `2` |
| **Máximo por slot** | Número máximo de reservas por horário | `1` |
| **Buffer entre marcações** | Minutos de intervalo entre sessões | `0` |

> **Dica:** Se define `buffer_minutes = 10` e slots de 30 min, o calendário cria automaticamente um intervalo de 10 minutos entre cada sessão.

<!-- 📸 IMAGEM SUGERIDA: Screenshot dos campos de disponibilidade preenchidos com valores de exemplo. -->
> ![Configuração Base — Disponibilidade](#)  
> *Figura 4.2 — Configuração de disponibilidade e horários.*

## 4.3 Funcionalidades Avançadas (Ativação)

Estas opções estão desativadas por defeito. Ative-as conforme necessário:

| Opção | Descrição | Quando ativar |
|---|---|---|
| **Múltiplos anfitriões** | Permite que o visitante escolha um profissional | Se tem mais de 1 profissional |
| **Múltiplos tipos de evento** | Oferece vários serviços para escolha | Se oferece mais de 1 serviço |
| **Horários por dia** | Horário diferente por dia da semana | Se os horários variam (ex.: 2ª das 9h-14h, 4ª das 16h-20h) |
| **Campos personalizados** | Adiciona perguntas extra ao formulário | Se precisa de informação adicional dos clientes |
| **Créditos de sessão** | Permite pacotes pré-pagos | Se vende pacotes de sessões |
| **Modo escuro** | `auto` / `on` / `off` | Para utilizadores com preferência escura |

<!-- 📸 IMAGEM SUGERIDA: Screenshot dos toggles de funcionalidades avançadas no separador Base. -->
> ![Funcionalidades Avançadas](#)  
> *Figura 4.3 — Toggles para ativar funcionalidades avançadas.*

## 4.4 Notificações por Email

| Campo | Descrição |
|---|---|
| **Email de confirmação** | Ativar/desativar email ao cliente quando reserva |
| **Email de notificação** | Ativar/desativar email ao admin quando recebe reserva |
| **Assunto do email** | Assunto do email de confirmação |
| **Email do remetente** | Endereço "De:" dos emails (deixar vazio = email do site) |

<!-- 📸 IMAGEM SUGERIDA: Screenshot dos campos de configuração de email. -->
> ![Configuração de Email](#)  
> *Figura 4.4 — Configuração de notificações por email.*

### ✅ Verificação — Passo 4 concluído

Após preencher a configuração base:
1. Aceda ao frontend (`/booking/`)
2. O calendário deve aparecer com os dias disponíveis
3. Clique num dia e verifique os slots de horário
4. Faça uma reserva de teste
5. Verifique se recebe os emails (cliente + admin)

<div style="page-break-after: always;"></div>

# 5. Tipos de Evento

**Caminho:** Admin → Booking → Tipos de Evento

Os tipos de evento permitem oferecer vários serviços aos visitantes, cada um com a sua própria duração, preço e cor.

## 5.1 Quando utilizar?

| Cenário | Recomendação |
|---|---|
| Ofereço **apenas 1 serviço** | ❌ Não ativar — usar a configuração geral |
| Ofereço **2+ serviços** com durações/preços diferentes | ✅ Ativar em Configuração → "Múltiplos tipos de evento" |

## 5.2 Criar um Tipo de Evento

1. Aceda a **Tipos de Evento → Adicionar Tipo de Evento**
2. Preencha os campos:

| Campo | Descrição | Exemplo |
|---|---|---|
| **Título** | Nome do serviço | `Consulta de Avaliação` |
| **Descrição** | Texto descritivo | `Primeira consulta gratuita de 45 minutos` |
| **Duração** (minutos) | Tempo da sessão | `45` |
| **Preço** | Valor a cobrar (0 = gratuito) | `25.00` |
| **Moeda** | Moeda do preço | `EUR` |
| **Cor** | Cor identificadora no calendário | `#0e5ef5` |
| **Classe de utilizador** | Restringir acesso a um userclass e107 | `0` (todos) |
| **Ordem** | Posição na lista | `1` |
| **Ativo** | Visível no frontend | ✅ |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do formulário de criação de tipo de evento com campos preenchidos. -->
> ![Criar Tipo de Evento](#)  
> *Figura 5.1 — Formulário de criação de um tipo de evento.*

## 5.3 Exemplos práticos

### Psicólogo

| Tipo | Duração | Preço | Cor |
|---|---|---|---|
| Sessão Individual | 50 min | 60€ | 🔵 `#337ab7` |
| Sessão de Casal | 80 min | 90€ | 🟢 `#28a745` |
| Primeira Consulta | 30 min | Grátis | 🟡 `#ffc107` |

### Academia de Línguas

| Tipo | Duração | Preço | Cor |
|---|---|---|---|
| Aula de Inglês | 60 min | 20€ | 🔴 `#dc3545` |
| Aula de Português | 45 min | 18€ | 🟢 `#28a745` |
| Conversação Livre | 30 min | Grátis | 🔵 `#17a2b8` |

<!-- 📸 IMAGEM SUGERIDA: Screenshot da lista de tipos de evento no admin, com vários tipos criados e as suas cores. -->
> ![Lista de Tipos de Evento](#)  
> *Figura 5.2 — Lista de tipos de evento configurados no painel.*

## 5.4 Como aparece no frontend

Quando ativado, o visitante vê um passo adicional no fluxo de reserva:

```
Escolher Serviço → Escolher Data → Escolher Horário → Preencher Dados → Confirmar
```

Se a funcionalidade **Múltiplos Anfitriões** também estiver ativada, o fluxo completo é:

```
Escolher Serviço → Escolher Profissional → Escolher Data → Escolher Horário → Preencher Dados → Confirmar
```

Cada tipo de evento aparece como um **cartão colorido** com título, descrição, duração e preço.

<!-- 📸 IMAGEM SUGERIDA: Screenshot do frontend mostrando os cartões de tipos de evento para o visitante escolher. -->
> ![Frontend — Tipos de Evento](#)  
> *Figura 5.3 — Seleção de tipo de evento no frontend.*

<div style="page-break-after: always;"></div>

# 6. Anfitriões (Hosts)

**Caminho:** Admin → Booking → Anfitriões

Os anfitriões representam os profissionais ou membros da equipa que recebem as reservas.

## 6.1 Quando utilizar?

| Cenário | Recomendação |
|---|---|
| **Uma pessoa** recebe todas as reservas | ❌ Não ativar |
| **Vários profissionais** com agendas separadas | ✅ Ativar em Configuração → "Múltiplos anfitriões" |

## 6.2 Criar um Anfitrião

| Campo | Descrição | Exemplo |
|---|---|---|
| **Nome** | Nome completo do profissional | `Dr. Ana Silva` |
| **Email** | Email de contacto (recebe notificações) | `ana@clinica.pt` |
| **Telefone** | Contacto telefónico | `+351 912 345 678` |
| **Bio** | Descrição curta do profissional | `Especialista em terapia cognitiva...` |
| **Cor** | Cor identificadora | `#e91e63` |
| **Utilizador e107** | Associar a uma conta e107 existente | Selecionar da lista |
| **Ordem** | Posição na lista | `1` |
| **Ativo** | Visível no frontend | ✅ |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do formulário de criação de anfitrião preenchido. -->
> ![Criar Anfitrião](#)  
> *Figura 6.1 — Formulário de criação de anfitrião.*

## 6.3 Associação com Tipos de Evento

Cada anfitrião pode estar associado a tipos de evento específicos. Isto permite:

- O **Dr. João** atende apenas `Sessões Individuais`
- A **Dra. Maria** atende `Sessões de Casal` e `Avaliações`

## 6.4 Como aparece no frontend

Quando a opção **Múltiplos Anfitriões** está ativada e existem anfitriões ativos, o visitante vê um passo de seleção de profissional no fluxo de reserva:

```
[Escolher Serviço →] Escolher Profissional → Escolher Data → Escolher Horário → Preencher Dados → Confirmar
```

Cada anfitrião é apresentado como um **cartão** com:

| Elemento | Descrição |
|---|---|
| **Avatar** | Círculo colorido com as iniciais do nome (cor definida no admin) |
| **Nome** | Nome completo do profissional |
| **Bio** | Descrição curta (se preenchida) |

O visitante clica no cartão do profissional pretendido para avançar para a seleção de data. Um botão **"← Alterar profissional"** permite voltar à lista de anfitriões a qualquer momento.

> **Nota:** Se não existirem tipos de evento ativados, a seleção de profissional é o primeiro passo do formulário.

<!-- 📸 IMAGEM SUGERIDA: Screenshot do frontend com a lista de anfitriões para o visitante selecionar. -->
> ![Frontend — Anfitriões](#)  
> *Figura 6.2 — Seleção de anfitrião no frontend.*

<div style="page-break-after: always;"></div>

# 7. Horários por Dia (Day Schedules)

**Caminho:** Admin → Booking → Horários por Dia

Permite definir horários de disponibilidade **diferentes para cada dia da semana**, substituindo o horário global definido na configuração geral.

## 7.1 Quando utilizar?

| Cenário | Recomendação |
|---|---|
| Horário **igual** todos os dias (ex.: 9h-18h) | ❌ Não ativar — usar configuração geral |
| Horário **variável** por dia (ex.: 2ª 9h-14h, 4ª 16h-20h) | ✅ Ativar em Configuração → "Horários por dia" |

## 7.2 Configurar Horários

1. Ative a opção em **Configuração → Base → Horários por dia**
2. Aceda a **Horários por Dia** no menu
3. Para cada dia da semana que tem disponibilidade:

| Campo | Descrição | Exemplo |
|---|---|---|
| **Dia** | Dia da semana (0=Domingo ... 6=Sábado) | `1` (Segunda-feira) |
| **Início** | Hora de início | `09:00` |
| **Fim** | Hora de fim | `14:00` |
| **Anfitrião** | Associar a um anfitrião específico (opcional) | `Dr. Ana Silva` |
| **Ativo** | Horário ativo | ✅ |

### Exemplo completo

| Dia | Horário | Anfitrião |
|---|---|---|
| Segunda | 09:00 – 14:00 | Dr. João |
| Terça | 09:00 – 18:00 | Dr. João |
| Quarta | 14:00 – 20:00 | Dra. Maria |
| Quinta | 09:00 – 18:00 | Todos |
| Sexta | 09:00 – 13:00 | Dr. João |

<!-- 📸 IMAGEM SUGERIDA: Screenshot da página de Horários por Dia no admin, mostrando a tabela configurada. -->
> ![Horários por Dia](#)  
> *Figura 7.1 — Configuração de horários variáveis por dia da semana.*

> **Dica:** Pode criar múltiplas entradas para o mesmo dia se diferentes anfitriões têm horários diferentes.

<div style="page-break-after: always;"></div>

# 8. Disponibilidade e Bloqueios

**Caminho:** Admin → Booking → Disponibilidade

Esta secção permite bloquear datas completas ou horários específicos, impedindo reservas nesse período.

## 8.1 Casos de uso

- 🏖️ Férias ou feriados
- 🏥 Ausência por doença
- 📅 Compromissos pessoais
- 🎄 Encerramento sazonal

## 8.2 Bloquear um dia completo

1. Aceda a **Disponibilidade**
2. Selecione a **data**
3. **Não preencha** o campo de hora
4. Adicione uma razão (ex.: "Feriado Nacional")
5. Guarde

> Resultado: todos os slots desse dia ficam indisponíveis no calendário frontend.

## 8.3 Bloquear um horário específico

1. Selecione a **data**
2. Selecione a **hora** específica (ex.: `14:00`)
3. Adicione uma razão (ex.: "Reunião interna")
4. Guarde

> Resultado: apenas esse slot fica indisponível; os restantes horários do dia mantêm-se.

<!-- 📸 IMAGEM SUGERIDA: Screenshot da página de Disponibilidade com algumas datas/horários bloqueados. -->
> ![Disponibilidade e Bloqueios](#)  
> *Figura 8.1 — Gestão de bloqueios de disponibilidade.*

## 8.4 Notas importantes

⚠️ **Atenção:**
- Os bloqueios **não cancelam** reservas existentes automaticamente
- Se precisa de cancelar uma reserva existente num dia que vai bloquear, faça-o manualmente na secção de Reservas
- Os bloqueios são **imediatos** — o slot desaparece do frontend assim que guarda

<!-- 📸 IMAGEM SUGERIDA: Screenshot do frontend mostrando um calendário com dias bloqueados (a cinzento ou riscados). -->
> ![Frontend — Dias Bloqueados](#)  
> *Figura 8.2 — Calendário frontend com dias bloqueados visíveis.*

<div style="page-break-after: always;"></div>

# 9. Gestão de Reservas

**Caminho:** Admin → Booking → Reservas

## 9.1 Lista de Reservas

A lista principal mostra todas as reservas com:

| Coluna | Informação |
|---|---|
| **Data** | Data da sessão |
| **Hora** | Horário da sessão |
| **Nome** | Nome e apelido do cliente |
| **Email** | Email de contacto |
| **Telefone** | Número de telefone |
| **Estado** | Pendente / Confirmado / Cancelado |
| **Pagamento** | Estado do pagamento (se aplicável) |
| **Ações** | Editar, eliminar |

### Estados da reserva

| Estado | Badge | Significado |
|---|---|---|
| **Pendente** | 🟡 `Pending` | Nova reserva a aguardar revisão |
| **Confirmado** | 🟢 `Confirmed` | Sessão aceite, email de confirmação enviado |
| **Cancelado** | 🔴 `Cancelled` | Sessão cancelada, email de cancelamento enviado |

<!-- 📸 IMAGEM SUGERIDA: Screenshot da lista de reservas no admin com filtros aplicados. -->
> ![Lista de Reservas](#)  
> *Figura 9.1 — Lista de reservas com filtros por estado.*

## 9.2 Confirmar / Cancelar uma Reserva

1. Na lista de reservas, clique em **Editar** na reserva pretendida
2. Altere o campo **Estado** para `Confirmado` ou `Cancelado`
3. Guarde

> O cliente recebe automaticamente um email com o novo estado, incluindo ligações de calendário (se confirmado).

## 9.3 Criar uma Reserva Manual

**Caminho:** Admin → Booking → Criar

Útil para reservas feitas por telefone ou presencialmente:

1. Selecione **Data** e **Hora**
2. Preencha nome, email, telefone
3. Opcionalmente associe um anfitrião e tipo de evento
4. Guarde

## 9.4 Cancelamento Self-Service

Os clientes podem cancelar as suas reservas sem intervenção do admin:

- Cada reserva tem um **token único** (`res_token`)
- O email de confirmação inclui um link de cancelamento
- O link direciona para `booking_cancel.php?token=XXXX`
- O cliente confirma o cancelamento

<!-- 📸 IMAGEM SUGERIDA: Screenshot do formulário de edição de uma reserva, mostrando todos os campos e o dropdown de estado. -->
> ![Editar Reserva](#)  
> *Figura 9.2 — Formulário de edição de reserva com detalhes completos.*

## 9.5 Histórico do Cliente

**Caminho:** Admin → Booking → Reservas → Clique no email de um cliente

Mostra o histórico completo de reservas de um cliente específico, incluindo:
- Total de reservas
- Taxa de cancelamento
- Última reserva
- Valor total pago

<div style="page-break-after: always;"></div>

# 10. Pagamentos Online

**Caminho:** Admin → Booking → Configuração → Separador "Pagamentos"

## 10.1 Visão Geral

O plugin suporta 3 gateways de pagamento:

| Gateway | Métodos | Melhor para |
|---|---|---|
| **Stripe** | Cartão Visa/Mastercard, Apple Pay, Google Pay | Internacional |
| **PayPal** | PayPal, cartões | Internacional |
| **Eupago** | MBWay, Multibanco, Cartão | 🇵🇹 Portugal |

## 10.2 Configuração Geral de Pagamentos

| Campo | Descrição |
|---|---|
| **Pagamentos ativados** | Ativar/desativar cobrança |
| **Gateway** | Selecionar o gateway (Stripe, PayPal, Eupago, Nenhum) |
| **Modo** | `test` (sandbox) ou `live` (produção) |
| **Moeda** | `EUR`, `USD`, `GBP`, etc. |
| **Preço base** | Valor cobrado por reserva (se não usar tipos de evento com preço) |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do separador de Pagamentos na Configuração com as opções gerais. -->
> ![Configuração de Pagamentos](#)  
> *Figura 10.1 — Configuração geral de pagamentos.*

## 10.3 Configurar Stripe

### Passo a passo

1. Crie uma conta em [stripe.com](https://stripe.com)
2. No Stripe Dashboard, copie as chaves:
   - **Chave Pública** (começa com `pk_test_` ou `pk_live_`)
   - **Chave Secreta** (começa com `sk_test_` ou `sk_live_`)
3. No Booking → Configuração → Pagamentos:
   - Selecione **Stripe** como gateway
   - Cole a Chave Pública e a Chave Secreta
   - Defina o modo como **test** para testar

### Testar com cartões de teste

| Número do cartão | Resultado |
|---|---|
| `4242 4242 4242 4242` | ✅ Pagamento com sucesso |
| `4000 0000 0000 0002` | ❌ Cartão recusado |
| `4000 0025 0000 3155` | 🔒 Requer 3D Secure |
| `4000 0000 0000 9995` | ❌ Fundos insuficientes |

> Use qualquer data de validade futura e qualquer CVC de 3 dígitos.

<!-- 📸 IMAGEM SUGERIDA: Screenshot dos campos de configuração do Stripe preenchidos com chaves de teste. -->
> ![Configuração Stripe](#)  
> *Figura 10.2 — Configuração do gateway Stripe.*

## 10.4 Configurar PayPal

### Passo a passo

1. Crie uma conta de desenvolvedor em [developer.paypal.com](https://developer.paypal.com)
2. Crie uma app e copie:
   - **Client ID**
   - **Secret**
3. No Booking → Configuração → Pagamentos:
   - Selecione **PayPal** como gateway
   - Cole o Client ID e o Secret
   - Defina o modo como **test** (sandbox)
4. Para testar, utilize a conta sandbox **buyer** que criou no PayPal Developer

<!-- 📸 IMAGEM SUGERIDA: Screenshot dos campos de configuração do PayPal preenchidos. -->
> ![Configuração PayPal](#)  
> *Figura 10.3 — Configuração do gateway PayPal.*

## 10.5 Configurar Eupago (🇵🇹 Portugal)

### Passo a passo

1. Crie uma conta em [eupago.pt](https://www.eupago.pt)
2. Obtenha a sua **API Key** no backoffice Eupago
3. No Booking → Configuração → Pagamentos:
   - Selecione **Eupago** como gateway
   - Cole a API Key
   - Escolha o método: **MBWay**, **Multibanco** ou **Cartão**

### Métodos disponíveis

| Método | Descrição |
|---|---|
| **MBWay** | O cliente recebe um push no telemóvel para autorizar |
| **Multibanco** | Gera uma referência para pagamento em ATM/homebanking |
| **Cartão** | Pagamento direto com cartão Visa/Mastercard |

<!-- 📸 IMAGEM SUGERIDA: Screenshot dos campos de configuração do Eupago com método MBWay selecionado. -->
> ![Configuração Eupago](#)  
> *Figura 10.4 — Configuração do gateway Eupago para Portugal.*

## 10.6 Fluxo de Pagamento (Frontend)

```
Visitante marca → Preenche dados → Redireccionado para pagamento → 
Pagamento confirmado → Reserva criada → Email enviado
```

> **Importante:** Se o pagamento falhar, a reserva **não é criada**.

<div style="page-break-after: always;"></div>

# 11. Cupões de Desconto

**Caminho:** Admin → Booking → Cupões

## 11.1 Quando utilizar?

- 🎁 Promoções sazonais
- 👋 Desconto para novos clientes
- 📢 Campanhas de marketing
- 🤝 Parcerias com empresas

## 11.2 Pré-requisito

Ative a opção **Cupões ativados** em Configuração → Base antes de criar cupões.

## 11.3 Criar um Cupão

| Campo | Descrição | Exemplo |
|---|---|---|
| **Código** | Código que o cliente introduz | `VERAO2026` |
| **Tipo de desconto** | Percentagem ou valor fixo | `percent` |
| **Valor** | Percentagem ou montante | `20` (= 20%) |
| **Limite de utilizações** | Quantas vezes pode ser usado (0 = ilimitado) | `50` |
| **Data de expiração** | Quando o cupão expira | `2026-09-30` |
| **Ativo** | Cupão ativo | ✅ |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do formulário de criação de cupão preenchido. -->
> ![Criar Cupão](#)  
> *Figura 11.1 — Formulário de criação de cupão de desconto.*

## 11.4 Como funciona no frontend

1. O visitante seleciona data e hora
2. No formulário de dados, aparece o campo **"Código de desconto"**
3. Introduz o código (ex.: `VERAO2026`)
4. O sistema valida automaticamente:
   - ✅ Código existe e está ativo
   - ✅ Não expirou
   - ✅ Não atingiu o limite de utilizações
5. O preço é atualizado com o desconto aplicado

<!-- 📸 IMAGEM SUGERIDA: Screenshot do frontend com o campo de cupão e o preço atualizado após aplicação do desconto. -->
> ![Frontend — Cupão Aplicado](#)  
> *Figura 11.2 — Cupão aplicado no formulário de reserva.*

<div style="page-break-after: always;"></div>

# 12. Créditos de Sessão

**Caminho:** Admin → Booking → Créditos

## 12.1 O que são?

Os créditos permitem que os clientes comprem **pacotes de sessões pré-pagos**. Em vez de pagar por sessão, o cliente adquire um pack (ex.: 10 sessões) e usa os créditos ao longo do tempo.

## 12.2 Quando utilizar?

| Cenário | Recomendação |
|---|---|
| Sessões avulsas | ❌ Não necessário |
| Pacotes de sessões (ex.: pack de 10) | ✅ Ativar |
| Planos mensais com X sessões incluídas | ✅ Ativar |

## 12.3 Pré-requisito

Ative **Créditos de sessão** em Configuração → Base.

## 12.4 Criar um Pacote de Créditos

| Campo | Descrição | Exemplo |
|---|---|---|
| **Utilizador** | Conta e107 do cliente | `João Silva` |
| **Tipo de evento** | Para qual serviço (0 = todos) | `Aula de Inglês` |
| **Total** | Número de créditos | `10` |
| **Usados** | Créditos já consumidos | `0` |
| **Expira** | Data de validade (opcional) | `2026-12-31` |
| **Nota** | Observações internas | `Pack Natal 2026` |
| **Ativo** | Pack ativo | ✅ |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do formulário de créditos preenchido, mostrando um pack de 10 sessões. -->
> ![Criar Créditos](#)  
> *Figura 12.1 — Criação de um pacote de 10 créditos de sessão.*

## 12.5 Como funciona

1. O admin cria o pack de créditos para um utilizador
2. Quando o utilizador faz uma reserva, o sistema verifica se tem créditos disponíveis
3. Se tem créditos, a reserva é criada e **1 crédito é deduzido**
4. O pagamento é saltado (o crédito substitui o pagamento)
5. O admin pode acompanhar o saldo na lista de créditos

<div style="page-break-after: always;"></div>

# 13. Campos Personalizados

**Caminho:** Admin → Booking → Campos Personalizados

## 13.1 O que são?

Perguntas ou campos adicionais que aparecem no formulário de reserva do frontend, além dos campos padrão (nome, email, telefone, notas).

## 13.2 Quando utilizar?

| Cenário | Exemplo de campo |
|---|---|
| Clínica | "Tem alguma condição médica?" (textarea) |
| Escola | "Nível de experiência" (dropdown: Iniciante/Intermédio/Avançado) |
| Salão | "Preferência de profissional" (dropdown) |
| Consultoria | "Website da sua empresa" (text) |
| Fitness | "Objetivos" (checkbox: Perder peso, Ganhar massa, Flexibilidade) |

## 13.3 Pré-requisito

Ative **Campos personalizados** em Configuração → Base.

## 13.4 Criar um Campo

| Campo | Descrição | Exemplo |
|---|---|---|
| **Rótulo** | Texto exibido ao utilizador | `Nível de experiência` |
| **Tipo** | `text`, `textarea`, `dropdown`, `checkbox`, `radio` | `dropdown` |
| **Obrigatório** | O cliente tem de preencher | ✅ |
| **Opções** | Opções para dropdown/checkbox/radio (separadas por `\|`) | `Iniciante\|Intermédio\|Avançado` |
| **Ordem** | Posição no formulário | `1` |
| **Ativo** | Campo visível | ✅ |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do formulário de criação de campo personalizado. -->
> ![Criar Campo Personalizado](#)  
> *Figura 13.1 — Criação de um campo personalizado tipo dropdown.*

## 13.5 Como aparece no frontend

Os campos personalizados aparecem no formulário de dados do visitante, entre os campos padrão e o botão de submissão.

<!-- 📸 IMAGEM SUGERIDA: Screenshot do frontend com campos personalizados visíveis no formulário de reserva. -->
> ![Frontend — Campos Personalizados](#)  
> *Figura 13.2 — Campos personalizados no formulário de reserva.*

## 13.6 Onde ver as respostas?

As respostas ficam guardadas no campo `res_custom_data` de cada reserva (formato JSON). São visíveis ao editar a reserva no admin.

<div style="page-break-after: always;"></div>

# 14. SEO e Dados Estruturados

**Caminho:** Admin → Booking → Configuração → Separador "SEO"

## 14.1 O que é e porquê?

O plugin gera automaticamente **dados estruturados JSON-LD** (Schema.org) que ajudam os motores de busca (Google, Bing) a compreender o conteúdo da sua página de reservas. Isto pode resultar em:

- ⭐ Rich snippets nos resultados de pesquisa
- 📍 Informação do negócio no Google Maps
- ⭐ Classificação por estrelas visível nos resultados
- 📅 Eventos próximos indexados

## 14.2 Configurar Dados do Negócio

| Campo | Descrição | Exemplo |
|---|---|---|
| **SEO ativado** | Ativar dados estruturados | ✅ |
| **Tipo de negócio** | Schema.org type | `MedicalBusiness`, `HealthAndBeautyBusiness` |
| **Nome do negócio** | Nome oficial | `Clínica Psicologia Lda.` |
| **Telefone** | Contacto principal | `+351 21 123 4567` |
| **Email** | Email do negócio | `info@clinica.pt` |
| **Morada** | Endereço | `Av. da Liberdade 100` |
| **Cidade** | Cidade | `Lisboa` |
| **Região** | Distrito/Estado | `Lisboa` |
| **Código postal** | Código postal | `1250-096` |
| **País** | Código ISO | `PT` |
| **Logótipo** | URL do logótipo | `https://site.pt/logo.png` |
| **Moeda** | Moeda dos preços | `EUR` |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do separador SEO com os dados do negócio preenchidos. -->
> ![Configuração SEO](#)  
> *Figura 14.1 — Configuração de dados estruturados do negócio.*

## 14.3 Meta Tags

| Campo | Descrição |
|---|---|
| **Meta Title** | Título personalizado para a página de reservas |
| **Meta Description** | Descrição para resultados de pesquisa (max 160 caract.) |
| **OG Image** | Imagem para partilhas nas redes sociais |

## 14.4 Schema de Avaliações (AggregateRating)

Se tem avaliações de clientes ativadas (ver Capítulo 15), o plugin gera automaticamente o schema `AggregateRating`:

```json
{
  "@type": "AggregateRating",
  "ratingValue": "4.8",
  "reviewCount": "23",
  "bestRating": "5"
}
```

> Isto pode gerar **estrelas nos resultados do Google** ⭐⭐⭐⭐⭐

## 14.5 Schema de Eventos

Quando ativado, o plugin gera automaticamente schema `Event` para os próximos slots disponíveis:

| Opção | Descrição |
|---|---|
| **Event Schema** | Ativar/desativar | 
| **Máximo de eventos** | Quantos eventos incluir no schema (ex.: 10) |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do código-fonte da página mostrando o JSON-LD gerado. -->
> ![JSON-LD Gerado](#)  
> *Figura 14.2 — Dados estruturados JSON-LD gerados automaticamente.*

<div style="page-break-after: always;"></div>

# 15. Avaliações e Classificações (Reviews)

**Caminho:** Admin → Booking → Avaliações

## 15.1 O que são?

Sistema que permite aos clientes deixar uma avaliação com classificação por estrelas (1-5) após uma sessão concluída.

## 15.2 Pré-requisito

Ative **Avaliações SEO** em Configuração → SEO → `seo_reviews_enabled`.

## 15.3 Gerir Avaliações

No painel admin, pode:

| Ação | Descrição |
|---|---|
| **Ver** | Lista de todas as avaliações com estrelas e texto |
| **Aprovar** | Ativar/desativar a visibilidade de cada avaliação |
| **Eliminar** | Remover avaliações inapropriadas |
| **Criar** | Adicionar uma avaliação manualmente |

### Campos de uma avaliação

| Campo | Descrição |
|---|---|
| **Reserva** | Reserva associada |
| **Utilizador** | Utilizador e107 (se registado) |
| **Classificação** | 1 a 5 estrelas |
| **Texto** | Comentário do cliente |
| **Ativo** | Visível no frontend e no schema |

<!-- 📸 IMAGEM SUGERIDA: Screenshot da lista de avaliações no admin, com estrelas visíveis. -->
> ![Gestão de Avaliações](#)  
> *Figura 15.1 — Lista de avaliações com classificações por estrelas.*

## 15.4 Impacto no SEO

Cada avaliação ativa contribui para o schema `AggregateRating`. Os motores de busca podem exibir:

```
Clínica Psicologia — ⭐⭐⭐⭐⭐ 4.8 (23 avaliações)
```

<div style="page-break-after: always;"></div>

# 16. Integração Google Calendar + Meet

**Caminho:** Admin → Booking → Configuração → Separador "Integrações"

## 16.1 O que faz?

- ✅ Cria automaticamente um **evento no Google Calendar** quando uma reserva é confirmada
- ✅ Opcionalmente, gera um **link Google Meet** anexado ao evento
- ✅ O link é enviado ao cliente no email de confirmação

## 16.2 Pré-requisitos

- Conta Google (preferencialmente Google Workspace)
- Projeto no Google Cloud Console
- API do Google Calendar ativada

## 16.3 Configuração Passo a Passo

### Passo 1 — Criar projeto no Google Cloud Console

1. Aceda a [console.cloud.google.com](https://console.cloud.google.com/)
2. Clique em **"Novo Projeto"** (ou select project → New)
3. Dê um nome (ex.: `Booking Plugin`)
4. Clique em **Criar**

<!-- 📸 IMAGEM SUGERIDA: Screenshot do Google Cloud Console — criação de novo projeto. -->
> ![Google Cloud — Novo Projeto](#)  
> *Figura 16.1 — Criação de projeto no Google Cloud Console.*

### Passo 2 — Ativar a API do Google Calendar

1. No projeto criado, aceda a **APIs & Services → Library**
2. Pesquise por **"Google Calendar API"**
3. Clique em **Enable**

<!-- 📸 IMAGEM SUGERIDA: Screenshot da biblioteca de APIs com "Google Calendar API" selecionada. -->
> ![Google Calendar API](#)  
> *Figura 16.2 — Ativação da Google Calendar API.*

### Passo 3 — Criar Conta de Serviço (Método Recomendado)

A **Conta de Serviço** é o método mais simples e recomendado — não requer que o utilizador faça login nem autorização manual. O servidor comunica diretamente com a API do Google.

1. Aceda a **APIs & Services → Credentials**
2. Clique em **"Create Credentials" → "Service Account"**
3. Dê um nome (ex.: `Booking Plugin`)
4. Clique em **Concluir** (os passos 2 e 3 do assistente são opcionais)
5. Na lista de contas de serviço, clique na conta criada
6. Aceda ao separador **"Keys"**
7. Clique em **"Add Key" → "Create new key"**
8. Selecione o formato **JSON**
9. Clique em **Criar** — o ficheiro JSON será descarregado automaticamente

> ⚠️ **Importante:** Guarde o ficheiro JSON em local seguro. Contém a chave privada e não pode ser descarregado novamente.

<!-- 📸 IMAGEM SUGERIDA: Screenshot da criação de conta de serviço e download da chave JSON. -->
> ![Criar Conta de Serviço](#)  
> *Figura 16.3 — Criação de Conta de Serviço e download da chave JSON.*

### Passo 4 — Partilhar o Calendário com a Conta de Serviço

Para que a Conta de Serviço possa criar eventos no seu calendário, deve partilhar o calendário com ela:

1. Abra [Google Calendar](https://calendar.google.com/)
2. Localize o calendário desejado na barra lateral esquerda
3. Clique nos **⋮** (três pontos) → **Definições e partilha**
4. Na secção **"Partilhar com pessoas específicas"**, clique em **"Adicionar pessoas"**
5. Cole o **email da conta de serviço** (encontra-se no ficheiro JSON no campo `client_email`, formato: `nome@projeto.iam.gserviceaccount.com`)
6. Selecione a permissão: **"Fazer alterações nos eventos"**
7. Clique em **Enviar**

<!-- 📸 IMAGEM SUGERIDA: Screenshot das definições de partilha do Google Calendar. -->
> ![Partilhar Calendário](#)  
> *Figura 16.4 — Partilha do calendário com o email da Conta de Serviço.*

### Passo 5 — Configurar no Booking (Conta de Serviço)

1. No e107, aceda a **Booking → Configuração → Integrações**
2. Ative **Google Calendar**
3. No campo **"JSON da Conta de Serviço"**, cole **todo o conteúdo** do ficheiro JSON descarregado
4. No campo **Calendar ID**, introduza:
   - `primary` → para o calendário principal da sua conta Google
   - Ou o ID específico (encontre-o em Google Calendar → Definições do calendário → "Calendar ID")
5. Clique em **Guardar**
6. O estado mostra um badge verde: **"Conta de Serviço configurada"** ✅ com o email da conta de serviço

> 💡 **Dica:** Com a Conta de Serviço, não é necessário clicar em nenhum botão de ligação — a autenticação é automática via chave privada.

<!-- 📸 IMAGEM SUGERIDA: Screenshot do separador Integrações com o JSON da Conta de Serviço preenchido. -->
> ![Configuração Conta de Serviço no Booking](#)  
> *Figura 16.5 — JSON da Conta de Serviço configurado no separador Integrações.*

---

### Método Alternativo: OAuth 2.0

Se preferir utilizar OAuth 2.0 em vez de Conta de Serviço (ex.: para contas Google pessoais sem acesso à consola cloud), siga estes passos:

#### A — Criar Credenciais OAuth 2.0

1. Aceda a **APIs & Services → Credentials**
2. Clique em **"Create Credentials" → "OAuth client ID"**
3. Tipo de aplicação: **"Web application"**
4. Dê um nome (ex.: `Booking Plugin`)
5. Em **"Authorized redirect URIs"**, adicione:
   ```
   https://seusite.com/e107_plugins/booking/admin_config.php?mode=main&action=prefs&gcal_callback=1
   ```
   *(substitua `seusite.com` pelo seu domínio real)*
6. Clique em **Criar**
7. Copie o **Client ID** e **Client Secret** gerados

> ⚠️ **Nota:** Se for a primeira vez a criar credenciais OAuth, o Google pode pedir que configure primeiro o **OAuth Consent Screen**:
> - Aceda a **APIs & Services → OAuth consent screen**
> - Selecione **External** (ou Internal para Google Workspace)
> - Preencha o nome da app e email de contacto
> - Adicione o scope `https://www.googleapis.com/auth/calendar`
> - Guarde e publique

#### B — Configurar no Booking

1. No e107, aceda a **Booking → Configuração → Integrações**
2. Ative **Google Calendar**
3. Deixe o campo **"JSON da Conta de Serviço"** vazio
4. Cole o **Client ID** e **Client Secret** nos campos correspondentes
5. No campo **Calendar ID**, introduza `primary` ou o ID do calendário
6. Clique em **Guardar**

#### C — Conectar a conta Google

1. Após guardar as credenciais, aparecerá o campo **"Estado da ligação"** com um botão azul **"Ligar Google Calendar"**
2. Clique no botão — será redirecionado para a página de autorização do Google
3. Selecione a sua conta Google
4. Autorize o acesso ao calendário (clique em **"Allow"** / **"Permitir"**)
5. Será redirecionado de volta ao admin com a mensagem **"Google Calendar ligado com sucesso!"**
6. O estado muda para um badge verde: **"Ligado ao Google Calendar"** ✅

> ⚠️ **Nota:** Se a app OAuth estiver em modo "Testing" no Google, pode aparecer um aviso "This app isn't verified". Clique em **"Advanced" → "Go to [nome da app]"** para continuar.

<!-- 📸 IMAGEM SUGERIDA: Screenshot do fluxo OAuth2 — botão de conexão e estado "Ligado". -->
> ![Conexão OAuth2 Google Calendar](#)  
> *Figura 16.6 — Método alternativo OAuth 2.0: botão de conexão e estado "Ligado".*

---

### Passo 6 — Ativar Google Meet (Opcional)

1. Na mesma secção de Integrações, ative **Google Meet**
2. Isto gera automaticamente um link de videoconferência em cada evento do calendário

### Passo 7 — Testar

1. Crie uma reserva de teste no frontend
2. Confirme a reserva no admin
3. Verifique:
   - ✅ Um evento aparece no Google Calendar
   - ✅ O campo `res_gcal_event_id` da reserva foi preenchido
   - ✅ Se Meet está ativo, o campo `res_gcal_meet_link` tem um URL

## 16.4 Google Meet — Notas

| Requisito | Detalhe |
|---|---|
| Conta Google Workspace | Recomendado para Meet funcionar automaticamente |
| Conta pessoal | Meet pode funcionar se o utilizador tem Meet ativado |
| Link gerado | Formato: `https://meet.google.com/xxx-yyyy-zzz` |

> O link de Meet é incluído no email de confirmação e no evento do calendário.

<div style="page-break-after: always;"></div>

# 17. Integração Zoom Meetings

**Caminho:** Admin → Booking → Configuração → Separador "Integrações"

## 17.1 O que faz?

- ✅ Cria automaticamente uma **reunião Zoom** quando uma reserva é confirmada
- ✅ O **Join URL** é enviado ao cliente no email de confirmação
- ✅ Suporta sala de espera, gravação automática e outras opções

## 17.2 Pré-requisitos

- Conta Zoom (gratuita ou Pro)
- App Server-to-Server OAuth no Zoom Marketplace

## 17.3 Configuração Passo a Passo

### Passo 1 — Criar App no Zoom Marketplace

1. Aceda a [marketplace.zoom.us](https://marketplace.zoom.us/)
2. Faça login com a sua conta Zoom
3. Clique em **Develop → Build App**
4. Selecione **"Server-to-Server OAuth"**
5. Dê um nome (ex.: `Booking Plugin`)

<!-- 📸 IMAGEM SUGERIDA: Screenshot do Zoom App Marketplace — criação de app Server-to-Server OAuth. -->
> ![Zoom — Criar App](#)  
> *Figura 17.1 — Criação de app Server-to-Server OAuth no Zoom.*

### Passo 2 — Obter Credenciais

Na página da app, anote:

| Credencial | Onde encontrar |
|---|---|
| **Account ID** | Separador "App Credentials" |
| **Client ID** | Separador "App Credentials" |
| **Client Secret** | Separador "App Credentials" |

<!-- 📸 IMAGEM SUGERIDA: Screenshot das credenciais da app Zoom (Account ID, Client ID, Client Secret). -->
> ![Zoom — Credenciais](#)  
> *Figura 17.2 — Credenciais da app Server-to-Server OAuth.*

### Passo 3 — Adicionar Scopes

1. Vá ao separador **Scopes**
2. Clique em **"Add Scopes"**
3. Pesquise e adicione: `meeting:write:admin` (ou `meeting:write`)
4. Guarde

### Passo 4 — Ativar a App

1. Vá ao separador **Activation**
2. Clique em **"Activate your app"**

### Passo 5 — Configurar no Booking

1. No e107, aceda a **Booking → Configuração → Integrações**
2. Ative **Zoom**
3. Preencha:
   - **Account ID**
   - **Client ID**
   - **Client Secret**
   - **Email do utilizador Zoom** (email da conta que aloja as reuniões)

<!-- 📸 IMAGEM SUGERIDA: Screenshot do separador Integrações com Zoom configurado. -->
> ![Configuração Zoom no Booking](#)  
> *Figura 17.3 — Zoom configurado no separador Integrações.*

### Passo 6 — Opções adicionais

| Opção | Descrição | Valor por defeito |
|---|---|---|
| **Sala de espera** | Participantes aguardam até o anfitrião admitir | ✅ Ativada |
| **Gravação automática** | `none`, `local`, `cloud` | `none` |

### Passo 7 — Testar

1. Crie e confirme uma reserva de teste
2. Verifique:
   - ✅ `res_zoom_meeting_id` está preenchido
   - ✅ `res_zoom_join_url` contém um URL Zoom válido
   - ✅ A reunião aparece na sua conta Zoom → Meetings

<div style="page-break-after: always;"></div>

# 18. Notificações SMS

**Caminho:** Admin → Booking → Configuração → Separador "Integrações"

## 18.1 O que faz?

Envia mensagens SMS ao cliente em momentos-chave:

| Evento | SMS enviado |
|---|---|
| Reserva confirmada | ✅ Confirmação com data e hora |
| Lembrete (se ativo) | ✅ Lembrete X horas antes da sessão |

## 18.2 Provedores suportados

| Provedor | Cobertura | Registo |
|---|---|---|
| **Twilio** | 🌍 Global (200+ países) | [twilio.com](https://www.twilio.com/try-twilio) |
| **seven.io** | 🇪🇺 Europa (foco DACH) | [seven.io](https://www.seven.io/) |

## 18.3 Configurar Twilio

### Passo a passo

1. Crie uma conta em [twilio.com](https://www.twilio.com/try-twilio)
2. No Twilio Console, obtenha:
   - **Account SID** (começa com `AC...`)
   - **Auth Token**
3. Adquira um **número de telefone** com capacidade SMS
4. No Booking → Configuração → Integrações:
   - Ative **SMS**
   - Selecione **Twilio** como provedor
   - Preencha Account SID, Auth Token e número de telefone
5. Defina o **prefixo por defeito** (ex.: `+351` para Portugal)

<!-- 📸 IMAGEM SUGERIDA: Screenshot da configuração de SMS com Twilio, campos preenchidos. -->
> ![Configuração SMS — Twilio](#)  
> *Figura 18.1 — Configuração do Twilio para SMS no Booking.*

### Testar Twilio

Em modo de teste (trial), o Twilio só envia SMS para números verificados:
1. No Twilio Console, aceda a **Verified Caller IDs**
2. Adicione o seu número pessoal
3. Faça uma reserva de teste com esse número
4. Verifique se recebeu o SMS

## 18.4 Configurar seven.io

### Passo a passo

1. Registe-se em [seven.io](https://www.seven.io/)
2. No dashboard, copie a sua **API Key**
3. No Booking → Configuração → Integrações:
   - Selecione **seven.io** como provedor SMS
   - Preencha a API Key
   - Defina o nome do remetente (ex.: `Booking`)

<!-- 📸 IMAGEM SUGERIDA: Screenshot da configuração de SMS com seven.io. -->
> ![Configuração SMS — seven.io](#)  
> *Figura 18.2 — Configuração do seven.io para SMS.*

## 18.5 Formato do número de telefone

> ⚠️ **Importante:** Os números devem estar no formato **E.164**: `+[código país][número]`

| País | Formato | Exemplo |
|---|---|---|
| 🇵🇹 Portugal | `+351XXXXXXXXX` | `+351912345678` |
| 🇧🇷 Brasil | `+55XXXXXXXXXXX` | `+5511912345678` |
| 🇪🇸 Espanha | `+34XXXXXXXXX` | `+34612345678` |

O campo de prefixo por defeito (`sms_default_prefix`) é adicionado automaticamente se o visitante não incluir o código do país.

<div style="page-break-after: always;"></div>

# 19. Notificações WhatsApp

**Caminho:** Admin → Booking → Configuração → Separador "Integrações"

## 19.1 O que faz?

Envia mensagens WhatsApp ao cliente quando a reserva é confirmada.

## 19.2 Provedores suportados

| Provedor | Descrição |
|---|---|
| **Twilio WhatsApp** | Usa a infraestrutura Twilio para enviar via WhatsApp |
| **Meta Cloud API** | API oficial do WhatsApp Business da Meta |

## 19.3 Configurar Twilio WhatsApp

### Pré-requisito

Ter o Twilio já configurado para SMS (Account SID + Auth Token).

### Passo a passo

1. No Twilio Console, aceda a **Messaging → WhatsApp Senders**
2. Ative um número para WhatsApp (ou use o sandbox para testes)
3. No Booking → Configuração → Integrações:
   - Ative **WhatsApp**
   - Selecione **Twilio** como provedor
   - Preencha o número WhatsApp Twilio (formato: `whatsapp:+1234567890`)

### Testar com Sandbox

1. No Twilio Console, aceda a **WhatsApp Sandbox**
2. Envie a mensagem `join [código]` do seu WhatsApp para o número do sandbox
3. Após a adesão, faça uma reserva de teste
4. Verifique se recebe a mensagem WhatsApp

<!-- 📸 IMAGEM SUGERIDA: Screenshot da configuração WhatsApp via Twilio. -->
> ![Configuração WhatsApp — Twilio](#)  
> *Figura 19.1 — Configuração de WhatsApp via Twilio.*

## 19.4 Configurar Meta Cloud API

### Passo a passo

1. Aceda a [developers.facebook.com](https://developers.facebook.com/)
2. Crie uma app **Business**
3. Adicione o produto **WhatsApp**
4. Obtenha:
   - **Phone Number ID** — ID do número de telefone
   - **Access Token** — Token de acesso permanente (ou temporário para testes)
5. No Booking → Configuração → Integrações:
   - Selecione **Meta** como provedor WhatsApp
   - Preencha Phone Number ID e Access Token

<!-- 📸 IMAGEM SUGERIDA: Screenshot da configuração WhatsApp via Meta Cloud API. -->
> ![Configuração WhatsApp — Meta](#)  
> *Figura 19.2 — Configuração de WhatsApp via Meta Cloud API.*

### Notas sobre templates

> ⚠️ Para mensagens iniciadas pela empresa (business-initiated), o WhatsApp Business API requer **templates pré-aprovados**. Crie um template no Meta Business Manager antes de enviar mensagens em produção.

<div style="page-break-after: always;"></div>

# 20. Lembretes Automáticos (Reminders)

**Caminho:** Admin → Booking → Configuração → Base

## 20.1 O que são?

Mensagens automáticas enviadas ao cliente X horas antes da sessão, para reduzir faltas.

## 20.2 Configuração

| Campo | Descrição | Valor por defeito |
|---|---|---|
| **Lembretes ativados** | Ativar o sistema de lembretes | ❌ Desativado |
| **Horas antes** | Quantas horas antes da sessão enviar o lembrete | `24` |

## 20.3 Canais de envio

O lembrete é enviado através dos canais ativos:

| Canal | Condição |
|---|---|
| 📧 **Email** | Sempre (se email de confirmação ativo) |
| 📱 **SMS** | Se SMS ativo e cliente tem telefone |
| 💬 **WhatsApp** | Se WhatsApp ativo e cliente tem telefone |

## 20.4 Funcionamento técnico

O plugin usa o sistema **e_cron.php** do e107:
1. Configure o cron do e107 em **Admin → Scheduled Tasks**
2. O cron verifica reservas confirmadas nas próximas X horas
3. Envia o lembrete e marca `res_reminder_sent = 1`
4. Não envia duplicados

<!-- 📸 IMAGEM SUGERIDA: Screenshot das configurações de lembretes + o Scheduled Tasks do e107. -->
> ![Lembretes Automáticos](#)  
> *Figura 20.1 — Configuração de lembretes automáticos.*

> **Dica:** Configure o cron do servidor para executar a cada hora:  
> `*/60 * * * * php /path/to/e107/cron.php`

<div style="page-break-after: always;"></div>

# 21. Widget Embebível (Embed)

**Caminho:** Admin → Booking → Embed

## 21.1 O que é?

Um widget que permite incorporar o formulário de reserva em **qualquer website externo** através de um `<iframe>`.

## 21.2 Quando utilizar?

- 🌐 Tem outro website (WordPress, HTML estático, etc.) e quer incluir reservas
- 📱 Quer disponibilizar o formulário numa landing page externa
- 🏢 O site do e107 é o "motor" de reservas para vários sites

## 21.3 Configuração

1. Aceda a **Booking → Embed**
2. Ative o **Widget Embebível** na Configuração → Base
3. Copie o código HTML gerado:

```html
<iframe src="https://seusite.pt/e107_plugins/booking/booking_embed.php"
        width="100%" height="700" frameborder="0"
        style="border: none; border-radius: 8px;">
</iframe>
```

4. Cole no HTML do site externo

<!-- 📸 IMAGEM SUGERIDA: Screenshot da página Embed com o código HTML e uma pré-visualização. -->
> ![Widget Embebível](#)  
> *Figura 21.1 — Código do widget embebível e pré-visualização.*

## 21.4 Personalização

O widget adapta-se ao tema escuro/claro e à largura do contentor. Para personalizar:

- Altere `width` e `height` do iframe
- O estilo CSS do widget segue o tema do e107

<div style="page-break-after: always;"></div>

# 22. Webhooks

**Caminho:** Admin → Booking → Webhooks

## 22.1 O que são?

Webhooks são **notificações HTTP automáticas** enviadas para um URL externo quando um evento ocorre no Booking.

## 22.2 Quando utilizar?

| Cenário | Exemplo |
|---|---|
| **Zapier/n8n** | Automatizar ações quando recebe uma reserva |
| **CRM** | Atualizar o contacto no CRM quando há nova reserva |
| **Slack/Teams** | Enviar notificação de nova reserva para um canal |
| **Sistema interno** | Sincronizar dados com outro sistema |

## 22.3 Pré-requisito

Ative **Webhooks** em Configuração → Base.

## 22.4 Criar um Webhook

| Campo | Descrição | Exemplo |
|---|---|---|
| **URL** | Endpoint que recebe o POST | `https://hooks.zapier.com/hooks/catch/...` |
| **Eventos** | Que eventos disparam o webhook | `booking.created, booking.confirmed, booking.cancelled` |
| **Secret** | Chave HMAC para verificar autenticidade | `meu-secret-seguro` |
| **Ativo** | Webhook ativo | ✅ |

### Eventos disponíveis

| Evento | Quando é disparado |
|---|---|
| `booking.created` | Nova reserva criada |
| `booking.confirmed` | Reserva confirmada |
| `booking.cancelled` | Reserva cancelada |
| `booking.deleted` | Reserva eliminada |

<!-- 📸 IMAGEM SUGERIDA: Screenshot do formulário de criação de webhook preenchido. -->
> ![Criar Webhook](#)  
> *Figura 22.1 — Formulário de criação de webhook.*

## 22.5 Payload enviado

O webhook envia um **POST JSON** com os dados da reserva:

```json
{
  "event": "booking.confirmed",
  "timestamp": 1774560000,
  "data": {
    "res_id": 42,
    "res_date": "2026-04-15",
    "res_time": "10:00:00",
    "res_name": "Maria",
    "res_lastname": "Silva",
    "res_email": "maria@email.pt",
    "res_status": 1
  }
}
```

## 22.6 Verificação HMAC

Se definiu um **secret**, o pedido inclui o header:  
`X-Booking-Signature: sha256=HASH`

O destinatário pode verificar a assinatura para garantir autenticidade.

<div style="page-break-after: always;"></div>

# 23. API REST

**Caminho:** Admin → Booking → API

## 23.1 O que é?

Uma API REST que permite a sistemas externos consultar e criar reservas no Booking.

## 23.2 Quando utilizar?

| Cenário | Exemplo |
|---|---|
| **App mobile** | App que consulta horários disponíveis |
| **Integração** | Sistema externo que cria reservas |
| **Dashboard** | Painel customizado com dados do Booking |

## 23.3 Configuração

1. Ative **API REST** em Configuração → Base
2. Aceda a **Booking → API**
3. Copie ou gere uma **API Key**

### Autenticação

Todas as chamadas à API devem incluir o header:

```
X-Booking-API-Key: SUA-CHAVE-AQUI
```

## 23.4 Endpoints principais

| Método | Endpoint | Descrição |
|---|---|---|
| `GET` | `/e107_plugins/booking/api.php?action=slots&date=2026-04-15` | Horários disponíveis |
| `GET` | `/e107_plugins/booking/api.php?action=reservations` | Listar reservas |
| `POST` | `/e107_plugins/booking/api.php?action=create` | Criar reserva |
| `GET` | `/e107_plugins/booking/api.php?action=event_types` | Listar tipos de evento |
| `GET` | `/e107_plugins/booking/api.php?action=hosts` | Listar anfitriões |

<!-- 📸 IMAGEM SUGERIDA: Screenshot da página API no admin com a chave gerada e a documentação dos endpoints. -->
> ![API REST](#)  
> *Figura 23.1 — Página de configuração da API com documentação.*

## 23.5 Exemplo de chamada (cURL)

```bash
curl -X GET \
  "https://seusite.pt/e107_plugins/booking/api.php?action=slots&date=2026-04-15" \
  -H "X-Booking-API-Key: SUA-CHAVE-AQUI"
```

<div style="page-break-after: always;"></div>

# 24. Dashboard e Estatísticas

**Caminho:** Admin → Booking → Dashboard

## 24.1 O que mostra?

O dashboard oferece uma **visão visual completa** das métricas do Booking:

### KPIs (Indicadores Chave)

| KPI | Descrição |
|---|---|
| 📅 **Total** | Total de reservas (todas) |
| 🟡 **Pendentes** | Reservas a aguardar confirmação |
| 🟢 **Confirmadas** | Reservas confirmadas |
| 🔴 **Canceladas** | Reservas canceladas |
| 📆 **Hoje** | Reservas para o dia de hoje |
| 📊 **Taxa de cancelamento** | Percentagem de cancelamentos |
| 💰 **Receita** | Total de pagamentos recebidos |

### Gráficos (Chart.js)

| Gráfico | Tipo | Dados |
|---|---|---|
| **Reservas por mês** | Barras | Últimos 12 meses |
| **Por estado** | Donut | Pendentes vs. Confirmadas vs. Canceladas |
| **Horas populares** | Barras horizontais | Top 10 horários mais reservados |
| **Top tipos de evento** | Barras | 6 tipos mais populares |

### Tabelas

| Tabela | Conteúdo |
|---|---|
| **Últimas reservas** | 10 reservas mais recentes com estado |
| **Top clientes** | 5 clientes com mais reservas |

<!-- 📸 IMAGEM SUGERIDA: Screenshot completo do Dashboard com KPIs e gráficos visíveis. -->
> ![Dashboard](#)  
> *Figura 24.1 — Dashboard com KPIs, gráficos e tabelas.*

<!-- 📸 IMAGEM SUGERIDA: Screenshot dos gráficos de barras e donut do Dashboard. -->
> ![Dashboard — Gráficos](#)  
> *Figura 24.2 — Gráficos de reservas por mês e por estado.*

<div style="page-break-after: always;"></div>

# 25. Exportação PDF / Excel

**Caminho:** Admin → Booking → Reservas → Botões de exportação

## 25.1 O que faz?

Permite exportar a lista de reservas nos formatos:

| Formato | Utilização |
|---|---|
| 📄 **PDF** | Relatórios para impressão ou arquivo |
| 📊 **Excel** (.xlsx) | Análise em folha de cálculo, filtros avançados |

## 25.2 Como exportar

1. Aceda a **Reservas**
2. Aplique os filtros desejados (data, estado, etc.)
3. Clique em:
   - 📄 **Export PDF** — descarrega um PDF com a tabela de reservas
   - 📊 **Export Excel** — descarrega um ficheiro .xlsx

<!-- 📸 IMAGEM SUGERIDA: Screenshot da lista de reservas com os botões de exportação PDF e Excel visíveis. -->
> ![Exportação PDF/Excel](#)  
> *Figura 25.1 — Botões de exportação na lista de reservas.*

## 25.3 Conteúdo exportado

| Coluna | Incluída |
|---|---|
| Data | ✅ |
| Hora | ✅ |
| Nome completo | ✅ |
| Email | ✅ |
| Telefone | ✅ |
| Estado | ✅ |
| Tipo de evento | ✅ |
| Anfitrião | ✅ |
| Valor pago | ✅ |

<div style="page-break-after: always;"></div>

# 26. Modo Escuro (Dark Mode)

**Caminho:** Admin → Booking → Configuração → Base → `dark_mode`

## 26.1 Opções

| Valor | Comportamento |
|---|---|
| `auto` | Segue a preferência do sistema operativo do visitante |
| `on` | Sempre modo escuro |
| `off` | Sempre modo claro |

O modo escuro afeta o formulário de reserva no frontend (calendário, formulário, confirmação).

<!-- 📸 IMAGEM SUGERIDA: Screenshot do frontend em modo escuro vs. modo claro, lado a lado. -->
> ![Modo Escuro vs. Claro](#)  
> *Figura 26.1 — Comparação do formulário de reserva em modo escuro e claro.*

<div style="page-break-after: always;"></div>

# 27. Suporte Multi-Idioma

## 27.1 Idiomas incluídos

| Idioma | Ficheiros |
|---|---|
| 🇬🇧 **English** | `languages/English/English_admin.php` + `English_front.php` |
| 🇪🇸 **Español** | `languages/Spanish/Spanish_admin.php` + `Spanish_front.php` |
| 🇵🇹 **Português** | `languages/Portuguese/Portuguese_admin.php` + `Portuguese_front.php` |

## 27.2 Como funciona

O e107 deteta automaticamente o idioma do site e carrega o ficheiro de idioma correspondente. Todas as strings da interface usam constantes `LAN_BOOKING_*`.

## 27.3 Adicionar um novo idioma

1. Copie a pasta `languages/English/`
2. Renomeie para o idioma desejado (ex.: `French/`)
3. Renomeie os ficheiros (ex.: `French_admin.php`, `French_front.php`)
4. Traduza todas as constantes dentro dos ficheiros
5. O e107 deteta automaticamente o novo idioma

<div style="page-break-after: always;"></div>

# 28. Guia do Utilizador Integrado

**Caminho:** Admin → Booking → Guia

O plugin inclui um guia completo integrado no painel de administração, com 7 separadores:

| Separador | Conteúdo |
|---|---|
| 📋 **Visão Geral** | Funcionalidades, casos de uso, áreas do admin |
| ⚙️ **Configuração** | Opções de configuração e testes de pagamento |
| 📅 **Reservas** | Gestão de estados e fluxo |
| 🚫 **Disponibilidade** | Bloqueio de datas e horários |
| 📆 **Calendário / iCal** | Integração com calendários externos |
| 🔌 **Integrações** | Google Calendar, Zoom, SMS, WhatsApp |
| 🔧 **Resolução de Problemas** | FAQ e soluções |

<div style="page-break-after: always;"></div>

# 29. Resolução de Problemas (Troubleshooting)

## 29.1 Problemas comuns

### ❌ Os emails não são enviados

**Causas possíveis:**
- A função `mail()` do PHP não está configurada no servidor
- O email do remetente está vazio ou inválido
- O servidor bloqueia emails de `localhost`

**Soluções:**
1. Verifique **e107 Admin → Preferências → Email** — configure SMTP se necessário
2. Preencha o campo **Email do remetente** na Configuração do Booking
3. Teste com um serviço SMTP externo (Gmail, SendGrid, etc.)

### ❌ Nenhum slot de horário aparece

**Causas possíveis:**
- O dia selecionado não está na lista de dias disponíveis
- O dia está totalmente bloqueado
- A hora atual já passou de todos os slots (com antecedência mínima)

**Soluções:**
1. Verifique os **Dias Disponíveis** na Configuração
2. Verifique a secção **Disponibilidade** para bloqueios
3. Verifique o campo **Antecedência mínima** (se muito alto, slots de hoje/amanhã podem não aparecer)

### ❌ Os links de calendário mostram hora errada

**Solução:** Verifique o campo **Timezone** na Configuração. Deve corresponder ao seu fuso horário real (ex.: `Europe/Lisbon`).

### ❌ A página de reservas mostra ecrã em branco

**Soluções:**
1. Verifique o log de erros do PHP
2. Confirme que o PHP é ≥ 8.0
3. Reinstale o plugin se as tabelas estiverem em falta
4. Verifique a consola do browser para erros JavaScript

### ❌ O pagamento Stripe falha

**Soluções:**
1. Verifique se as chaves são do modo correto (`pk_test_`/`sk_test_` para testes)
2. Certifique-se de que o site usa **HTTPS**
3. Verifique os logs do Stripe Dashboard

### ❌ O Google Calendar não cria eventos

**Soluções:**
1. Verifique se o calendário está partilhado com o email da conta de serviço
2. Confirme que a permissão é "Make changes to events"
3. Verifique se o conteúdo JSON está correto (sem espaços extra)
4. Confirme que a Google Calendar API está ativada no projeto

### ❌ O SMS não é enviado

**Soluções:**
1. Em modo trial do Twilio, apenas números verificados recebem SMS
2. Verifique se o número está no formato E.164
3. Confirme o Account SID e Auth Token
4. Verifique o saldo da conta Twilio

### ❌ Os anfitriões não aparecem no frontend

**Causas possíveis:**
- A opção **Múltiplos Anfitriões** não está ativada na Configuração
- Todos os anfitriões estão com o campo **Ativo** desmarcado
- Não existem anfitriões criados

**Soluções:**
1. Aceda a **Configuração → Base** e ative "Múltiplos anfitriões"
2. Verifique em **Anfitriões** que pelo menos um anfitrião tem ✅ Ativo
3. Crie pelo menos um anfitrião com nome e cor definidos

<div style="page-break-after: always;"></div>

# 30. Plano de Implementação Recomendado

## 30.1 Ordem de configuração sugerida

Siga esta ordem para uma instalação progressiva e testável:

### 🟢 Fase 1 — Essencial (Dia 1)

| Passo | Ação | Testar |
|---|---|---|
| 1 | Instalar o plugin | ✅ Menu aparece no admin |
| 2 | Configuração Geral (título, horários, slots) | ✅ Calendário aparece no frontend |
| 3 | Fazer reserva de teste | ✅ Reserva aparece na lista |
| 4 | Verificar emails | ✅ Emails recebidos (cliente + admin) |

### 🟡 Fase 2 — Profissional (Dia 2-3)

| Passo | Ação | Testar |
|---|---|---|
| 5 | Criar Tipos de Evento | ✅ Cartões aparecem no frontend |
| 6 | Criar Anfitriões | ✅ Seleção de profissional funciona |
| 7 | Configurar Horários por Dia | ✅ Horários diferentes por dia |
| 8 | Bloquear datas de teste | ✅ Datas ficam indisponíveis |

### 🔵 Fase 3 — Pagamentos (Dia 4-5)

| Passo | Ação | Testar |
|---|---|---|
| 9 | Configurar gateway (Stripe/PayPal/Eupago) | ✅ Fluxo de pagamento funciona |
| 10 | Criar cupões de teste | ✅ Desconto aplica-se corretamente |
| 11 | Testar com cartões de teste | ✅ Pagamento capturado/recusado |

### 🟣 Fase 4 — Integrações (Dia 6-7)

| Passo | Ação | Testar |
|---|---|---|
| 12 | Configurar Google Calendar + Meet | ✅ Evento criado no GCal |
| 13 | Configurar Zoom (se aplicável) | ✅ Reunião criada no Zoom |
| 14 | Configurar SMS (Twilio/seven.io) | ✅ SMS recebido |
| 15 | Configurar WhatsApp (se aplicável) | ✅ Mensagem recebida |

### 🔴 Fase 5 — Avançado (Dia 8-10)

| Passo | Ação | Testar |
|---|---|---|
| 16 | Configurar SEO e Dados Estruturados | ✅ JSON-LD no código-fonte |
| 17 | Ativar Avaliações | ✅ Avaliação criada e visível |
| 18 | Configurar Campos Personalizados | ✅ Campos visíveis no formulário |
| 19 | Configurar Créditos (se aplicável) | ✅ Crédito deduzido |
| 20 | Configurar Webhooks | ✅ POST recebido no endpoint |
| 21 | Configurar API REST | ✅ Endpoint responde com dados |
| 22 | Configurar Widget Embed | ✅ Widget funciona em site externo |
| 23 | Ativar Lembretes | ✅ Lembrete enviado |

### ⚫ Fase 6 — Produção

| Passo | Ação |
|---|---|
| 24 | Alterar gateways de pagamento para modo **live** |
| 25 | Verificar todos os emails com o domínio real |
| 26 | Fazer backup completo da base de dados |
| 27 | Publicar o site e anunciar o sistema de reservas |

<div style="page-break-after: always;"></div>

# Apêndice A — Referência Rápida — Todas as Funcionalidades

| # | Funcionalidade | Versão | Prioridade | Separador Config |
|---|---|---|---|---|
| 1 | Calendário interativo mensal | v1.0 | 🟢 Essencial | Base |
| 2 | Formulário de reserva multi-passo | v1.0 | 🟢 Essencial | Base |
| 3 | Emails automáticos (confirmação + notificação) | v1.0 | 🟢 Essencial | Base |
| 4 | Validação frontend (JS) + backend (PHP) | v1.0 | 🟢 Essencial | — |
| 5 | Exportação iCal (.ics) | v1.1 | 🟡 Recomendado | — |
| 6 | Links de calendário nos emails | v1.1 | 🟡 Recomendado | — |
| 7 | Guia do Utilizador integrado | v1.1 | 🟡 Recomendado | — |
| 8 | Múltiplos Anfitriões | v1.2 | 🟡 Recomendado | Base |
| 9 | Múltiplos Tipos de Evento | v1.2 | 🟡 Recomendado | Base |
| 10 | Horários por Dia | v1.2 | 🟡 Recomendado | Base |
| 11 | Buffer entre marcações | v1.2 | 🟢 Essencial | Base |
| 12 | Pagamentos Stripe | v1.3 | 🔵 Opcional | Pagamentos |
| 13 | Pagamentos PayPal | v1.3 | 🔵 Opcional | Pagamentos |
| 14 | Pagamentos Eupago (PT) | v1.3 | 🔵 Opcional | Pagamentos |
| 15 | Cupões de desconto | v1.3 | 🔵 Opcional | Base |
| 16 | SEO — Schema.org JSON-LD | v1.4 | 🟡 Recomendado | SEO |
| 17 | Meta tags (title, description, OG) | v1.4 | 🟡 Recomendado | SEO |
| 18 | URL amigável `/booking/` | v1.4 | 🟢 Essencial | — |
| 19 | Dashboard com gráficos | v2.0 | 🟡 Recomendado | — |
| 20 | Exportação PDF / Excel | v2.0 | 🟡 Recomendado | — |
| 21 | API REST | v2.0 | 🔵 Opcional | Base |
| 22 | Webhooks | v2.0 | 🔵 Opcional | Base |
| 23 | Cancelamento self-service | v2.0 | 🟡 Recomendado | — |
| 24 | Lembretes por email/cron | v2.0 | 🟡 Recomendado | Base |
| 25 | Integração utilizadores e107 | v2.1 | 🟡 Recomendado | — |
| 26 | Restrições userclass | v2.1 | 🔵 Opcional | — |
| 27 | Créditos de sessão | v2.1 | 🔵 Opcional | Base |
| 28 | Notificações nativas e107 | v2.1 | 🟡 Recomendado | — |
| 29 | Modo escuro | v2.2 | 🟡 Recomendado | Base |
| 30 | Widget embebível | v2.2 | 🔵 Opcional | Base |
| 31 | Campos personalizados | v2.2 | 🔵 Opcional | Base |
| 32 | Formulário multi-idioma | v2.2 | 🟡 Recomendado | — |
| 33 | Google Calendar | v2.3 | 🔵 Opcional | Integrações |
| 34 | Google Meet | v2.3 | 🔵 Opcional | Integrações |
| 35 | Zoom Meetings | v2.3 | 🔵 Opcional | Integrações |
| 36 | SMS (Twilio / seven.io) | v2.3 | 🔵 Opcional | Integrações |
| 37 | WhatsApp (Twilio / Meta) | v2.3 | 🔵 Opcional | Integrações |
| 38 | Avaliações e classificações | v2.3 | 🔵 Opcional | SEO |
| 39 | Schema AggregateRating + Review | v2.3 | 🔵 Opcional | SEO |
| 40 | Schema Event para próximos slots | v2.3 | 🔵 Opcional | SEO |

<div style="page-break-after: always;"></div>

# Apêndice B — Mapa de Prioridades

## Por caso de uso — o que ativar

### 🏥 Psicólogo / Terapeuta

| Funcionalidade | Ativar? |
|---|---|
| Calendário + formulário | ✅ Obrigatório |
| Emails | ✅ Obrigatório |
| Tipos de evento | ⚪ Opcional (se tem vários tipos de sessão) |
| Anfitriões | ❌ Não necessário (1 profissional) |
| Pagamentos | ✅ Recomendado |
| Google Calendar | ✅ Recomendado |
| Google Meet / Zoom | ✅ Se faz sessões online |
| SMS / WhatsApp | ✅ Recomendado (reduz faltas) |
| SEO | ✅ Recomendado |
| Avaliações | ⚪ Opcional |

### 🎓 Academia / Escola

| Funcionalidade | Ativar? |
|---|---|
| Tipos de evento | ✅ Obrigatório (várias disciplinas) |
| Anfitriões | ✅ Obrigatório (vários professores) |
| Horários por dia | ✅ Recomendado |
| Pagamentos | ✅ Recomendado |
| Créditos | ✅ Recomendado (pacotes de aulas) |
| Cupões | ⚪ Opcional (promoções) |
| Campos personalizados | ✅ "Nível de experiência" |

### 💇 Salão de Beleza

| Funcionalidade | Ativar? |
|---|---|
| Tipos de evento | ✅ Obrigatório (corte, manicure, etc.) |
| Anfitriões | ✅ Obrigatório (vários profissionais) |
| Pagamentos | ⚪ Opcional |
| Cupões | ✅ Recomendado |
| SMS | ✅ Recomendado |
| Avaliações | ✅ Recomendado |

### 💼 Consultor / Freelancer

| Funcionalidade | Ativar? |
|---|---|
| Tipos de evento | ✅ (Discovery call vs. Sessão completa) |
| Pagamentos | ✅ Obrigatório |
| Google Calendar | ✅ Obrigatório |
| Zoom | ✅ Recomendado |
| SEO | ✅ Recomendado |
| API / Webhook | ⚪ Se integra com CRM |

<div style="page-break-after: always;"></div>

# Apêndice C — Checklist de Testes Finais

Use esta checklist para validar cada funcionalidade antes de colocar o sistema em produção.

## Teste geral

- [ ] Plugin instala sem erros
- [ ] 11 tabelas criadas na base de dados
- [ ] Calendário aparece no frontend (`/booking/`)
- [ ] Dias disponíveis estão corretos
- [ ] Slots de horário aparecem ao clicar num dia

## Reservas

- [ ] Criar reserva via frontend — dados guardam corretamente
- [ ] Email de confirmação recebido pelo cliente
- [ ] Email de notificação recebido pelo admin
- [ ] Alterar estado para "Confirmado" — email enviado
- [ ] Alterar estado para "Cancelado" — email enviado
- [ ] Cancelamento self-service via link funciona

## Tipos de evento

- [ ] Cartões de tipos aparecem no frontend (se ativado)
- [ ] Duração e preço corretos
- [ ] Cores visíveis

## Anfitriões

- [ ] Lista de anfitriões aparece no frontend (se ativado)
- [ ] Reserva associada ao anfitrião correto

## Horários por dia

- [ ] Horários diferentes por dia da semana (se ativado)
- [ ] Slots respeitam o horário configurado

## Disponibilidade

- [ ] Dia bloqueado não mostra slots
- [ ] Slot bloqueado não aparece, restantes sim

## Pagamentos

- [ ] Stripe em modo teste — pagamento com sucesso
- [ ] Stripe — cartão recusado funciona
- [ ] PayPal sandbox — fluxo completo
- [ ] Eupago (se configurado) — referência gerada
- [ ] Cupão aplicado corretamente

## Integrações

- [ ] Google Calendar — evento criado ao confirmar
- [ ] Google Meet — link gerado (se ativo)
- [ ] Zoom — reunião criada ao confirmar
- [ ] SMS — mensagem recebida
- [ ] WhatsApp — mensagem recebida

## Avançado

- [ ] SEO — JSON-LD presente no código-fonte
- [ ] Avaliações — criar e visualizar
- [ ] Campos personalizados — visíveis e guardam dados
- [ ] Créditos — crédito deduzido ao reservar
- [ ] Webhooks — POST recebido no endpoint de teste
- [ ] API — endpoint responde com dados válidos
- [ ] Widget Embed — funciona em página externa
- [ ] Lembretes — lembrete enviado (simular com cron)
- [ ] Modo escuro — alterna corretamente
- [ ] Exportação PDF — ficheiro descarregado
- [ ] Exportação Excel — ficheiro descarregado

## Produção

- [ ] Gateways alterados para modo **live**
- [ ] Chaves de API de produção configuradas
- [ ] SSL (HTTPS) ativo
- [ ] Backup da base de dados realizado
- [ ] Cron do e107 configurado para lembretes
- [ ] Testado em dispositivos móveis (responsivo)

---

## 📞 Suporte

Para questões, bugs ou sugestões:

- **GitHub:** [github.com/Kanonimpresor/booking](https://github.com/Kanonimpresor/booking)
- **Email:** info@landingpro.pt
- **Website:** [landingpro.pt](https://landingpro.pt)

---

*Este manual foi criado para a versão 2.3.0 do Booking Plugin. Todas as funcionalidades descritas estão implementadas e testadas.*

© 2026 LandingPro / Martin Costa — GPL v2+