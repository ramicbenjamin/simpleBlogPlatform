-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2017 at 08:25 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpleblogplatformdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanak`
--

CREATE TABLE `clanak` (
  `id` int(11) NOT NULL,
  `naslov` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL,
  `autor` int(11) NOT NULL,
  `slika` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `clanak`
--

INSERT INTO `clanak` (`id`, `naslov`, `tekst`, `autor`, `slika`) VALUES
(86, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer vitae dictum nisl. Integer eleifend, nibh sit amet aliquet lobortis, massa libero lacinia nibh, sed finibus metus nulla a lectus. Quisque auctor consectetur magna nec imperdiet. Nulla vulputate auctor leo eget tristique. Ut fringilla nibh libero, in volutpat nunc blandit ut. Aliquam erat volutpat. Proin et blandit magna, in bibendum odio. Fusce molestie aliquet nisl a porta. Sed eget mauris gravida, ornare sem et, consequat mauris. Donec fringilla convallis nulla, tincidunt condimentum turpis luctus vel.\r\n\r\nCras volutpat suscipit hendrerit. Sed leo ligula, commodo nec sem vitae, fermentum eleifend lorem. Nulla mi augue, viverra a nulla id, condimentum sagittis risus. Nunc purus sem, imperdiet a hendrerit ac, dignissim non nulla. Proin ut volutpat orci. Aenean in nibh eros. Nullam hendrerit, sapien et commodo condimentum, velit sapien suscipit mauris, quis semper elit lacus sed ex. Etiam odio dui, aliquet at molestie condimentum, sagittis at metus. Sed ornare augue ac neque maximus vehicula.\r\n\r\nCras feugiat vel eros quis faucibus. Morbi lobortis imperdiet dui a auctor. Etiam congue nulla vitae purus rutrum, quis bibendum ipsum facilisis. Nam posuere nisi enim, eget efficitur ante placerat vel. Duis placerat, risus eget semper auctor, quam lectus luctus lacus, efficitur sodales felis sapien eu nunc. Etiam finibus convallis velit ac accumsan. Donec maximus nulla nec risus convallis suscipit. Vivamus ut lorem eu arcu facilisis scelerisque a eu purus. Nullam porttitor condimentum enim at convallis. Nullam sed tortor dolor. Duis nibh quam, pellentesque eu ultrices nec, vulputate eget nunc. Etiam vehicula erat tellus, sed ultrices leo pharetra ac. Vivamus maximus hendrerit eros in tristique. Vivamus eleifend sem id orci viverra, commodo blandit lorem elementum. Nunc a nulla nec ipsum porttitor sagittis non et metus.\r\n\r\nEtiam non tincidunt nisi, eget blandit felis. In quam mi, rhoncus in egestas in, eleifend quis elit. Phasellus finibus lacus non sem pellentesque, vitae consectetur tortor posuere. Ut ac urna finibus, eleifend elit nec, accumsan tortor. Etiam turpis sapien, ullamcorper a aliquet vitae, viverra quis magna. Nulla eget vestibulum arcu, sit amet lacinia turpis. Mauris consequat quis tortor sit amet mattis. Donec dictum nisl turpis, lobortis placerat lacus volutpat ac. Ut nec commodo sapien. Nullam efficitur velit a lacus ullamcorper faucibus. Vivamus fermentum quam lacus, sit amet ultricies dui elementum sed. Quisque ex orci, varius ultricies odio sed, venenatis scelerisque elit. Morbi ornare commodo libero, eu consectetur lacus pellentesque a.\r\n\r\nDonec vel ex posuere, mattis ante ac, ultrices ligula. Proin pulvinar arcu eget accumsan rhoncus. Donec eu est vehicula, elementum odio nec, lobortis justo. Donec tempor mollis leo, at scelerisque ligula vestibulum ac. Mauris ligula diam, placerat eget hendrerit non, pellentesque ut eros. Aliquam quis velit et lectus convallis ullamcorper vitae eget purus. Etiam nisi ex, ullamcorper et libero a, tempor molestie nisl. Aliquam metus lorem, finibus in pharetra nec, tempor vitae urna. Praesent feugiat dui at massa auctor consequat rhoncus at ipsum. Mauris consectetur, ipsum vitae aliquet sodales, nunc nunc lacinia nulla, ac euismod elit eros eu nibh. Sed aliquet lacinia metus, vel maximus metus efficitur eget. Curabitur vehicula pharetra nisl molestie finibus. Maecenas vitae sem vel metus viverra bibendum.', 1, 'slika86.jpg'),
(87, 'Petipsum', 'Puppy kitty ipsum dolor sit good dog toys food fetch wagging aquatic chew park. Hamster fluffy sit chew run fast chirp nap lol catz wet nose brush maine coon cat parakeet. Feathers kisses left paw vaccine behavior field run commands twine turtle cockatiel cat treats pet gate run. Tooth cage lol catz gimme five teeth treats fetch behavior vaccine feathers vaccine carrier pet gate catch bed. Cage licks fleas tail stay groom puppy food finch. Dog House bed cat fleas scratch dinnertime cage pet supplies small animals chow tooth shake litter box. Paws Mittens dinnertime dog house stay kitten play vaccination Scooby snacks scratch parakeet water dog run field window chow litter box scratch water dog kibble. Harness foot fish ID tag feeder gimme five Rover bark ball bed tongue Spike speak bird seed crate barky bird food wet nose barky. Tabby feathers cat walk aquatic throw field walk.Swimming gimme five bird gimme five birds parrot fluffy. Finch dinnertime paws drool food Rover hamster behavior chew wagging heel. Puppy speak left paw run fast dinnertime crate Rover maine coon cat chew feathers tongue chirp food harness. Wet Nose Buddy mouse harness bird Rover pet food birds. Fur grooming ball chew walk kitty grooming treats. Mittens tooth nap biscuit scratch dog play dead brush. Sit right paw wet nose commands walk good boy collar speak fluffy running scratcher house train dog house fluffy carrier behavior speak gimme five vitamins. Feeder cat tooth kitten pet walk Rover window chew vaccination finch hamster left paw dinnertime furry.Fur left paw heel cat nest hamster commands gimme five tabby Tigger tooth yawn behavior lazy cat good boy dragging feathers. Brush wag tail dragging tongue throw vaccination fluffy. Stripes finch small animals stripes speak litter stay behavior carrier leash meow brush window lick parakeet paws aquatic wet nose dragging bedding. Turtle bed water dog chirp cage yawn scratch Rover walk bark. Slobbery pet gate ID tag good boy shake wet nose toy nap play dead bird seed park dog house tooth crate behavior. Food fleas field tooth pet whiskers kibble parakeet tail dog play chew play dead water dog run fast cage mouse. Cage gimme five mouse meow slobber parrot bark canary wag tail cat. Pet Supplies ID tag water dog treats bark critters pet gate small animals slobbery right paw. Maine Coon Cat fleas aquatic park running chow vaccination slobbery heel small animals running house train wet nose string puppy.Chew lick play parakeet licks puppy fur lol catz dinnertime gimme five foot slobber crate canary food Spike wagging food ID tag parrot. Fleas birds cage licks fish bird toy grooming dinnertime walk pet gate purr roll over barky window feathers foot teeth. Ball meow carrier bark nest kitty tail chirp catch barky behavior. Kitty dog house mouse toy maine coon cat shake bed left paw feathers Rover. Water tuxedo ferret right paw maine coon cat lol catz fur fetch commands chirp vaccination stay fluffy dog leash. Bird right paw vitamins park critters scratcher toy bird food paws toy play. Play Dead food harness purr furry heel hamster slobbery Tigger lazy dog litter fur. Drool maine coon cat twine bird food swimming dog ferret sit food twine aquarium grooming. Roll Over pet supplies litter box Rover walk yawn critters Mittens critters crate maine coon cat ID tag small animals finch hamster gimme five catch small animals Scooby snacks.Gimme Five tooth leash wet nose water cockatiel vaccine scratcher pet gate toys bedding. Paws tabby window carrier wagging slobber gimme five lazy dog canary finch maine coon cat park slobber bark pet food parrot lol catz Buddy. Tabby vaccine tabby walk left paw running smooshy paws catch harness bird aquarium toy polydactyl. Twine tail kibble water chirp collar Spike behavior kisses fetch. Cage Tigger aquarium Scooby snacks ferret Scooby snacks groom licks birds dragging mouse brush tongue fetch field dog house string park fur. Maine Coon Cat tuxedo ball shake stay ferret chirp roll over sit warm scratcher fetch birds cage. Rover ID tag teeth Scooby snacks puppy treats water dog food behavior nap pet water smooshy. Chirp pet crate commands bedding sit left paw stick Scooby snacks. Foot walk crate bed bark running bark. Wet Nose bird slobber cage shake food good boy vitamins chew food.', 6, 'slika87.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `clanak_id` int(11) NOT NULL,
  `tekst` text COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `clanak_id`, `tekst`) VALUES
(59, 86, 'Evo jedan kometar, čisto da se provjeri da li radi.'),
(60, 87, 'Ovdje ima više komentara.'),
(61, 87, 'Evo vidite kako ima puno komentara.'),
(62, 87, 'Stvarno puno komentara.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_slovenian_ci NOT NULL,
  `rodjendan` date NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `rodjendan`, `username`, `password`) VALUES
(1, 'Benjamin', 'Ramić', 'mail@mail.com', '1995-05-31', 'ben', '25d55ad283aa400af464c76d713c07ad'),
(6, 'Belmin', 'Mustajbašić', 'sdado@mail.com', '2017-01-19', 'belm', '25f9e794323b453885f5181f1b624d0b'),
(13, 'Ahmed', 'Popović', 'ahmed@liliumdev.ba', '2017-01-11', 'ahmed', 'b4af804009cb036a4ccdc33431ef9ac9'),
(14, 'Belmin', 'Mustajbašić', 'ahmed@liliumdev.ba', '2017-01-25', 'belmin', '25f9e794323b453885f5181f1b624d0b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanak`
--
ALTER TABLE `clanak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `autor` (`autor`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clanak_id` (`clanak_id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanak`
--
ALTER TABLE `clanak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clanak`
--
ALTER TABLE `clanak`
  ADD CONSTRAINT `clanak_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `korisnik` (`id`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`clanak_id`) REFERENCES `clanak` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
