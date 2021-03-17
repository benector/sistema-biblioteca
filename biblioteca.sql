-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 08:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Livro'),
(154, 'Artigo');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exemplaries`
--

CREATE TABLE `exemplaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exemplaries`
--

INSERT INTO `exemplaries` (`id`, `created_at`, `updated_at`, `code`, `work_id`) VALUES
(1, '2021-03-17 08:51:48', '2021-03-17 08:51:48', 23121142, 142),
(2, '2021-03-17 08:54:50', '2021-03-17 08:54:50', 72583939, 142),
(4, '2021-03-17 09:00:06', '2021-03-17 09:00:06', 21241424, 153),
(5, '2021-03-17 09:01:11', '2021-03-17 09:01:22', 293728738, 154);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_05_224744_create_categories_table', 1),
(5, '2020_09_05_225044_create_courses_table', 1),
(6, '2021_03_13_024755_create_subjects_table', 1),
(7, '2021_03_13_025958_create_works_table', 1),
(10, '2021_03_13_031856_create_exemplaries_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fantasia', NULL, NULL),
(4, 'Romance', NULL, NULL),
(154, 'Suspense', NULL, NULL),
(155, 'Ciência', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com.br', '2021-03-16 18:51:53', '$2y$10$/Pf.99x4AWOrk5KYE4QBXukFQ68nMtuKEm3IP1PSeIhbbisTcXBc6', '1', '7SgGXpOam3', '2021-03-16 18:51:53', '2021-03-16 18:51:53'),
(2, 'Kenya Morar', 'myrtis.will@example.com', '2021-03-16 18:51:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0', 'zCubHTa8ge', '2021-03-16 18:51:53', '2021-03-16 18:51:53'),
(3, 'Mr. Virgil Orn', 'elwin.harvey@example.org', '2021-03-16 18:51:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0', 'LaX5IGvKen', '2021-03-16 18:51:53', '2021-03-16 18:51:53'),
(4, 'Ron Kiehn', 'oyundt@example.net', '2021-03-16 18:51:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0', 'h89dYN8qnM', '2021-03-16 18:51:53', '2021-03-16 18:51:53'),
(5, 'Royce Feil MD', 'amari09@example.com', '2021-03-16 18:51:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0', 'Z326XM7a11', '2021-03-16 18:51:53', '2021-03-16 18:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authors` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `pages` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `title`, `authors`, `edition`, `resume`, `pages`, `img`, `year`, `created_at`, `updated_at`, `category_id`, `subject_id`) VALUES
(142, 'Harry Potter e as Relíquias da Morte', 'J.K Rowling', '1ª edição', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\">Harry Potter está prestes a fazer 17 anos, mas, ao contrário das outras vezes, não irá para Hogwarts após seu aniversário. Agora, escoltado por uma verdadeira brigada de bruxos, ele precisa fugir, antes que Voldemort o encontre. Esse ingresso brusco na vida adulta marca o início da aventura do jovem bruxo no último livro da série, Harry Potter e as Relíquias da Morte, que chegou às livrarias do país ao primeiro minuto do dia 10 de novembro de 2007, com tiragem inicial de 400 mil exemplares, pela Editora Rocco.A edição em inglês de Harry Potter e as Relíquias da Morte saiu no dia 21 de julho, provocando uma corrida dos</span><br></p>', 592, '16159634116051a51331e81.jpg', 2007, '2021-03-17 04:11:59', '2021-03-17 09:43:31', 1, 1),
(153, 'A Caçada', 'Clive Cussler', '32 edição', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\">Por décadas, Clive Cussler vem deleitando leitores com romances repletos de suspense, ação e pura audácia. Agora, ele faz isso novamente, em um dos mais loucos e estimulantes thrillers de época dos últimos anos.</span><br style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\">O governo norte-americano contrata a renomada Agência de Detetives Van Dorn e seu agente igualmente renomado, Isaac Bell, para capturar um lendário ladrão de bancos conhecido como Assaltante Açougueiro. Este assassinara homens, mulheres e crianças, sem deixar nenhuma pista nem testemunhas. O detetive Bell lidera a busca e finalmente descobre a verdadeira identidade do Assaltante Açougueiro. E nesse momento inicia-se a verdadeira caçada.</span><br style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 14px;\">Com um enredo intrincado, dois vilões extraordinários e a assinatura de Cussler em reviravoltas surpreendentes, A Caçada é o trabalho de um mestre no auge de seu talento.</span>', 384, '16159637236051a64b3f295.jpg', 2013, '2021-03-17 07:19:20', '2021-03-17 09:49:27', 1, 154),
(154, 'Percy Jackson e O ladrão de Raios', 'Rick Riordan', '1º edição', '<span style=\"color: rgb(51, 51, 51); font-family: Roboto, sans-serif; font-size: 16px;\">Primeiro volume da saga Percy Jackson e os olimpianos, \"O Ladrão de Raios\" esteve entre os primeiros lugares na lista das séries mais vendidas do The New York Times. O autor conjuga lendas da mitologia grega com aventuras no século XXI. Nelas, os deuses do Olimpo continuam vivos, ainda se apaixonam por mortais e geram filhos metade deuses, metade humanos, como os heróis da Grécia antiga. Marcados pelo destino, eles dificilmente passam da adolescência. Poucos conseguem descobrir sua identidade. O garoto-problema Percy Jackson é um deles. Tem experiências estranhas em que deuses e monstros mitológicos parecem saltar das páginas dos livros direto para a sua vida. Pior que isso: algumas dessas criaturas estão bastante irritadas. Um artefato precioso foi roubado do Monte Olimpo e Percy é o principal suspeito. Para restaurar a paz, ele e seus amigos - jovens heróis modernos - terão de fazer mais do que capturar o verdadeiro ladrão: precisam elucidar uma traição mais ameaçadora que a fúria dos deuses.</span>', 400, '16159636106051a5da90505.jpg', 2014, '2021-03-17 07:21:53', '2021-03-17 09:46:50', 1, 1),
(155, 'COVID-19 e os impactos na saúde mental: uma amostra do Rio Grande do Sul, Brasil', 'Michael de Quadros Duarte, Manuela Almeida da Silva Santo, Carolina Palmeiro Lima, Jaqueline Portella Giordani, Clarissa Marceli Trentini', '-', '<p><span style=\"color: rgb(64, 61, 57); font-family: Arial, sans-serif; font-size: 14px;\">As pandemias, como a da COVID-19, afetam uma quantidade relativamente grande de pessoas e impõem novas regras e hábitos sociais para a população mundial. As informações sobre a pandemia são constantes na mídia. Além disso, o distanciamento social foi adotado no Brasil como medida de prevenção da disseminação da COVID-19, o que pode ter consequências econômicas e psicossociais. Nesse contexto, o objetivo deste estudo foi verificar os fatores associados a indicadores de sintomas de transtornos mentais em residentes do Rio Grande do Sul, durante o período inicial da política de distanciamento social decorrente da pandemia da COVID-19. O estudo foi aprovado pelo CONEP. Participaram 799 pessoas, com idades entre 18 e 75 anos (M = 36,56; DP = 12,88), 82,7% mulheres, que responderam um questionário sociodemográfico, de distanciamento social e ao Self-Report Questionnaire (SRQ-20). Os resultados indicaram que ter renda diminuída no período, fazer parte do grupo de risco e estar mais exposto a informações sobre mortos e infectados, são fatores que podem provocar maior prejuízo na saúde mental nesse período pandemia. Investigar determinantes sociais que contribuem para maior vulnerabilidade ao adoecimento mental da população é importante no campo da saúde coletiva para o planejamento de ações e políticas públicas.</span><br></p>', 15, '16159641186051a7d67147f.png', 2020, '2021-03-17 09:55:18', '2021-03-17 09:55:18', 154, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_user_course_id_user_id_unique` (`course_id`,`user_id`),
  ADD KEY `course_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `exemplaries`
--
ALTER TABLE `exemplaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exemplaries_work_id_foreign` (`work_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_category_id_foreign` (`category_id`),
  ADD KEY `works_subject_id_foreign` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_user`
--
ALTER TABLE `course_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exemplaries`
--
ALTER TABLE `exemplaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exemplaries`
--
ALTER TABLE `exemplaries`
  ADD CONSTRAINT `exemplaries_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `works_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
