-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 03:44 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thelorry`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `acc_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `username`, `password`, `role`, `status`, `acc_name`) VALUES
(1, 'user@thelorry.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', 1, 'Mark Zukenbert'),
(2, 'admin@thelorry.com', '21232f297a57a5a743894a0e4a801fc3', '1', 1, 'Admin System'),
(7, 'nikos@thelorry.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', 1, 'Nikosi Sotirakopoulos');

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article` text NOT NULL,
  `title` varchar(150) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `publish_by` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article`, `title`, `acc_id`, `status`, `publish_by`) VALUES
(1, 'By Sean Bell\r\n\r\nDemands for transparency are central to the current culture of public debate. Climate scientists and their associations, the former English football captain, individual politicians and political parties, arts organisations, BBC broadcasters, financial institutions, and local government have all been criticised in the past few days for not being transparent enough. The right of the public to question the decisions of those with power and demand disclosure of information from those in authority is essential for democracy, but transparency has become a double-edged sword, smudging all kinds of cultural distinction between the powerful and ordinary person. This has led to demands for transparency of that entity we used to call the private citizen. These demands can only control the behaviour of the citizen in general and stifle the creativity that relies on cultural exchanges between people.\r\n\r\nThat transparency would threaten the privacy of the individual at first seems obvious, because wanting to know something requires the disclosure of something that someone else may prefer to remain hidden. We have always had to balance the public interest with that of the privacy of the individual, depending upon the issue. But when those in authority take up the cry for more transparency, rather than those who seek to bring authority to account, the result is less likely to be the democratic investigation of powerful interests and more likely the undemocratic control of the individual.\r\n\r\nTransparency is less of a threat to privacy in the sense that more information about an individual may be gathered or demanded. It is a greater threat to privacy in the sense that the actions we take and the autonomous decisions we all make in whatever capacity become subject to a panoptical scrutiny with the retrospective ability to censure or punish. This has the potential to restrict action and narrow the basis upon which we act.', 'How Public Scrutiny of Power is Becoming the Power to Scrutinise the Public', 1, 1, 'Sean Bell'),
(8, 'By Mark Carrigan\r\n\r\nIn 1986, DC Comics published a four issue mini-series called Batman: The Dark Knight Returns. While few would have predicted it prior to its publication, this work of Frank Miller was soon regarded as one of the touchstones for the medium and, through commercial success and critical controversy, almost single-handedly reinvigorated a moribund character. Time magazine suggested the portrayal of a ‘semiretired Batman [who] drinks too much and is unsure about his crime-fighting abilities’ was an example of trying to appeal to ‘today’s sceptical readers’.\r\n\r\nRegardless of the criticism which the series received in some quarters, it undoubtedly did appeal to readers and the manner in which its ‘dark’ and ‘adult’ approach were progressively taken up by other comics points to the ‘scepticism’ of those readers being a widespread condition rather than the aberrant property of a cynical minority. The same dark approach lay behind the critical and commercial success which Christopher Nolan’s The Dark Knight enjoyed at the box office in the summer of 2008. Why is this kind of approach so popular? What explains its manifest resonance amongst vast swathes of the cinema-going and comic-buying public?\r\n\r\nPerhaps the answers lies towards the end of the film when Batman and Jim Gordon attempt to make sense of Harvey Dent’s actions, as the brave and virtuous district attorney was driven to attempted murder by the cruel machinations of the joker. The public regards Bent as a hero, but the public face of heroism becomes a fiction, crafted by powerful men in midnight schemes, because the masses could not countenance that the grim truth and social order necessitates the illusion. The heroism of Harvey Bent becomes a cruel joke, which Batman, alter ego of the billionaire Bruce Wayne, attempts to hide in the best interests of the public. If it was not for his own personal biography, as a man forever damaged by the murder of his parents as a child, he might have channelled this patrician impulse into philanthropy. As it is stands, he rushes off into the night, chased by police and dogs, taking the blame for the crimes that Bent committed. His parting words sum up the ethos of the exchange: ‘You either die a hero or live long enough to see yourself become the villain’. This is the bitter truth which the public must be protected from at all costs. The closest thing to heroism which The Dark Knight portrays is the attempted deception of the public towards this end.\r\n\r\nCompare this critically-lauded portrayal of heroism within that of another popular film series. While The Dark Knight was an enormous critical success, the Rocky films were, with the partial exceptions of the first and the sixth, critically panned. Yet both, in a sense, portray heroism. Once you look beyond the crass jingoism that frames large aspects of the Rocky series, a rather earnest narrative about heroism and virtue soon comes into focus. Each of the films follows the same format, as constancy and courage enable Rocky Balboa to triumph over adversity. The virtues the films portray have a long moral history in western culture and yet for most of us, the narrative that portrays them is one we struggle to take seriously. While the moralisation of professional boxing probably takes some blame for this, it is by no means the whole story.\r\n\r\nWhat we can take seriously however is The Wire, and, its gritty social realism notwithstanding, it comes equally equipped with its heroes. Foremost among these is stick up boy Omar Little. He prowls Baltimore in his trench coat, with his shotgun slung at his side, robbing drug dealers. With his facial scar, ethical code, and fearsome reputation, he becomes a mythic figure known throughout Baltimore. He crafts a mythology from the ruins of deindustrialised desolation and he sustains a heroic existence one day a time. Yet he cannot, ultimately, escape from his surroundings, and he dies ingloriously on the floor of a convenience store after being shot to death by a child.\r\n\r\nWhat message can we take from this? Perhaps that when a hero is reduced to a daily struggle for survival, his or her heroism is unsustainable. The Wire’s realism ultimately conveys, perhaps inadvertently, the impossibility of heroism in the late modern age. We can struggle against the constraints of circumstances and the debasing forces of contemporary times. We can craft an honourable life in the midst of violence and suffering. However, the effort required is herculean and inevitably, at least in the long run, beyond us. This is the message conveyed by the sudden and pointless death of Omar, as well as by this sort of social realism more generally.\r\nYet if we accept this realism, I think we have lost something important. Though The Wire itself admirably retains the capacity for imminent social critique, this is the exception rather than the rule, and it is primarily a consequence of the sheer talent of the creators of the series. The ‘scepticism’ which Time magazine suggested was responsible for The Dark Knight’s success has only grown since 1986 and it is far from a positive cultural trend. The cultural theorist Mark Fisher calls it ‘capitalist realism’: the aestheticisation of capitalist hegemony. As Fisher puts it, ‘capitalism seamlessly occupies the horizons of the thinkable’ and, as such, dominates the sensibility and aesthetics of cultural production. However, unlike historical instances of a politicised aesthetics, the ensuing cultural style is neither narrowly aesthetic, nor superficially political. It manifests itself in a ‘machismo of demythologisation’ which proudly undercuts heroism in the name of psychological realism (‘you either die a hero or live long enough to see yourself become the villain’) and hope in the name of sociological realism (everything ultimately comes down to power and deceit). It counsels suspicion and scepticism in the name of an acceptance of reality that will help protect us against the ideological machinations of the powerful.', 'Modern Heroism', 2, 1, 'Mark Carrigan'),
(11, 'The Business Traveler’s Dream, promoted as “the world’s first wholesale travel book engine,” worked like a charm for my staff at Social Editing. The main feature of this site is that you can compare prices from other travel booking sites, and see how much you can save. They offer savings up to 65% and it’s no joke: our staff stayed at the Marriott in Omaha, Nebraska for 5 days for just $600 per person, which came out to be about 60% better than what Expedia offered. Our company saved thousands of dollars through this site in one trip. For small to medium-sized businesses, these kind of savings can mean the difference between thriving and only getting by.\r\n\r\nHow do they do it? Well, The Business Traveler’s Dream is in contact with over 400,000 hotels worldwide and have negotiated prices with them. Also, these negotiations are not reflected on any other site, so you can get exclusive cuts in prices. What’s also unique about The Business Traveler’s Dream is that they incorporate taxes in promoted prices, unlike most other travel booking sites. Along with this transparency, they offer a money back guarantee of 110% of the difference if you find a price better than theirs.\r\n\r\nConsidering all these factors of convenience, I can easily say that The Business Traveler’s Dream is the go-to place for businesses to book flights.', 'Review of a Travel Site', 7, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmn_id` int(11) NOT NULL,
  `cmn_desc` varchar(200) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `acc_id` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmn_id`, `cmn_desc`, `article_id`, `status`, `acc_id`, `date_created`) VALUES
(1, 'halu nice article man\r\n', 8, 1, 1, '2020-12-23 06:01:35'),
(9, 'what a nice article i really love it such a inpired', 1, 0, 7, '2020-12-23 06:01:35'),
(10, 'anyone would think same as me right', 1, 0, 7, '2020-12-23 06:01:35'),
(11, 'anyone would think same as me right', 1, 0, 7, '2020-12-23 06:01:35'),
(12, 'nice article', 1, 0, 7, '2020-12-23 06:01:35'),
(13, 'yeah me too man', 1, 0, 1, '2020-12-23 06:01:35'),
(16, 'awesome article', 11, 0, 7, '2020-12-24 02:33:02'),
(17, 'yeah very awesome man', 11, 0, 1, '2020-12-24 02:36:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmn_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
