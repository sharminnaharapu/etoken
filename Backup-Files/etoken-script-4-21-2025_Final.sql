USE [master]
GO
/****** Object:  Database [etoken]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE DATABASE [etoken]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'etoken', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER01\MSSQL\DATA\etoken.mdf' , SIZE = 73728KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'etoken_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL16.MSSQLSERVER01\MSSQL\DATA\etoken_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
 WITH CATALOG_COLLATION = DATABASE_DEFAULT, LEDGER = OFF
GO
ALTER DATABASE [etoken] SET COMPATIBILITY_LEVEL = 160
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [etoken].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [etoken] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [etoken] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [etoken] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [etoken] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [etoken] SET ARITHABORT OFF 
GO
ALTER DATABASE [etoken] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [etoken] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [etoken] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [etoken] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [etoken] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [etoken] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [etoken] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [etoken] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [etoken] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [etoken] SET  DISABLE_BROKER 
GO
ALTER DATABASE [etoken] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [etoken] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [etoken] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [etoken] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [etoken] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [etoken] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [etoken] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [etoken] SET RECOVERY FULL 
GO
ALTER DATABASE [etoken] SET  MULTI_USER 
GO
ALTER DATABASE [etoken] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [etoken] SET DB_CHAINING OFF 
GO
ALTER DATABASE [etoken] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [etoken] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [etoken] SET DELAYED_DURABILITY = DISABLED 
GO
ALTER DATABASE [etoken] SET ACCELERATED_DATABASE_RECOVERY = OFF  
GO
EXEC sys.sp_db_vardecimal_storage_format N'etoken', N'ON'
GO
ALTER DATABASE [etoken] SET QUERY_STORE = ON
GO
ALTER DATABASE [etoken] SET QUERY_STORE (OPERATION_MODE = READ_WRITE, CLEANUP_POLICY = (STALE_QUERY_THRESHOLD_DAYS = 30), DATA_FLUSH_INTERVAL_SECONDS = 900, INTERVAL_LENGTH_MINUTES = 60, MAX_STORAGE_SIZE_MB = 1000, QUERY_CAPTURE_MODE = AUTO, SIZE_BASED_CLEANUP_MODE = AUTO, MAX_PLANS_PER_QUERY = 200, WAIT_STATS_CAPTURE_MODE = ON)
GO
USE [etoken]
GO
/****** Object:  User [sun]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE USER [sun] FOR LOGIN [sun] WITH DEFAULT_SCHEMA=[dbo]
GO
ALTER ROLE [db_owner] ADD MEMBER [sun]
GO
ALTER ROLE [db_accessadmin] ADD MEMBER [sun]
GO
ALTER ROLE [db_securityadmin] ADD MEMBER [sun]
GO
ALTER ROLE [db_ddladmin] ADD MEMBER [sun]
GO
ALTER ROLE [db_backupoperator] ADD MEMBER [sun]
GO
ALTER ROLE [db_datareader] ADD MEMBER [sun]
GO
ALTER ROLE [db_datawriter] ADD MEMBER [sun]
GO
ALTER ROLE [db_denydatareader] ADD MEMBER [sun]
GO
ALTER ROLE [db_denydatawriter] ADD MEMBER [sun]
GO
/****** Object:  Table [dbo].[cache]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cache](
	[key] [nvarchar](255) NOT NULL,
	[value] [nvarchar](max) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[cache_locks]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[cache_locks](
	[key] [nvarchar](255) NOT NULL,
	[owner] [nvarchar](255) NOT NULL,
	[expiration] [int] NOT NULL,
 CONSTRAINT [cache_locks_key_primary] PRIMARY KEY CLUSTERED 
(
	[key] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[counter_token_calls]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[counter_token_calls](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[department_id] [bigint] NOT NULL,
	[service_id] [bigint] NOT NULL,
	[counter_id] [bigint] NULL,
	[name] [nvarchar](255) NULL,
	[phone] [nvarchar](255) NULL,
	[token_number] [nvarchar](255) NOT NULL,
	[status] [nvarchar](255) NOT NULL,
	[atend_by] [bigint] NULL,
	[call_time] [datetime] NULL,
	[date] [date] NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[counters]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[counters](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[deacription] [nvarchar](max) NULL,
	[status] [nvarchar](255) NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[deleted_service_log]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[deleted_service_log](
	[log_id] [int] IDENTITY(1,1) NOT NULL,
	[service_id] [int] NULL,
	[department_id] [int] NULL,
	[name] [nvarchar](100) NULL,
	[description] [nvarchar](max) NULL,
	[image] [nvarchar](255) NULL,
	[status] [bit] NULL,
	[create_by] [nvarchar](50) NULL,
	[update_by] [nvarchar](50) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
	[deleted_on] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[log_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[departments]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[departments](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[deacription] [nvarchar](max) NULL,
	[status] [nvarchar](255) NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[display_services]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[display_services](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[display_id] [bigint] NOT NULL,
	[service_id] [bigint] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[displays]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[displays](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[deacription] [nvarchar](max) NULL,
	[status] [nvarchar](255) NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[doctor]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[doctor](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[dept_id] [bigint] NOT NULL,
	[status] [varchar](20) NULL,
	[create_by] [int] NULL,
	[update_by] [int] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[doctor_token_calls]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[doctor_token_calls](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[doctor_id] [bigint] NOT NULL,
	[department_id] [bigint] NOT NULL,
	[service_id] [bigint] NOT NULL,
	[room_id] [bigint] NULL,
	[name] [nvarchar](255) NULL,
	[phone] [nvarchar](255) NULL,
	[token_number] [nvarchar](255) NOT NULL,
	[status] [nvarchar](255) NOT NULL,
	[atend_by] [bigint] NULL,
	[call_time] [datetime] NULL,
	[date] [date] NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[doctor_tokens]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[doctor_tokens](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[doctor_id] [bigint] NOT NULL,
	[department_id] [bigint] NOT NULL,
	[service_id] [bigint] NULL,
	[counter_id] [bigint] NULL,
	[room_id] [bigint] NULL,
	[name] [nvarchar](255) NULL,
	[phone] [nvarchar](255) NULL,
	[token_number] [nvarchar](255) NOT NULL,
	[note] [nvarchar](255) NULL,
	[status] [nvarchar](255) NOT NULL,
	[atend_by] [bigint] NULL,
	[call_time] [datetime] NULL,
	[date] [date] NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[failed_jobs]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[failed_jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[uuid] [nvarchar](255) NOT NULL,
	[connection] [nvarchar](max) NOT NULL,
	[queue] [nvarchar](max) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[exception] [nvarchar](max) NOT NULL,
	[failed_at] [datetime] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[general_settings]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[general_settings](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[title] [nvarchar](255) NOT NULL,
	[address] [nvarchar](max) NULL,
	[phone] [nvarchar](255) NOT NULL,
	[email] [nvarchar](255) NOT NULL,
	[currency] [nvarchar](255) NOT NULL,
	[currency_symbol] [nvarchar](255) NOT NULL,
	[country] [nvarchar](255) NULL,
	[mane_logo] [nvarchar](255) NOT NULL,
	[fab_logo] [nvarchar](255) NOT NULL,
	[print_logo] [nvarchar](255) NULL,
	[stamp] [nvarchar](255) NOT NULL,
	[leaveform_print_logo] [nvarchar](255) NOT NULL,
	[facebook] [nvarchar](255) NULL,
	[twitter] [nvarchar](255) NULL,
	[linked_in] [nvarchar](255) NULL,
	[youtube] [nvarchar](255) NULL,
	[instagram] [nvarchar](255) NULL,
	[pinterest] [nvarchar](255) NULL,
	[snapchat] [nvarchar](255) NULL,
	[vk] [nvarchar](255) NULL,
	[website] [nvarchar](255) NULL,
	[create_by] [bigint] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[job_batches]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[job_batches](
	[id] [nvarchar](255) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[total_jobs] [int] NOT NULL,
	[pending_jobs] [int] NOT NULL,
	[failed_jobs] [int] NOT NULL,
	[failed_job_ids] [nvarchar](max) NOT NULL,
	[options] [nvarchar](max) NULL,
	[cancelled_at] [int] NULL,
	[created_at] [int] NOT NULL,
	[finished_at] [int] NULL,
 CONSTRAINT [job_batches_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[jobs]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[jobs](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[queue] [nvarchar](255) NOT NULL,
	[payload] [nvarchar](max) NOT NULL,
	[attempts] [tinyint] NOT NULL,
	[reserved_at] [int] NULL,
	[available_at] [int] NOT NULL,
	[created_at] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[migrations]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[migrations](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[migration] [nvarchar](255) NOT NULL,
	[batch] [int] NOT NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[password_reset_tokens]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[password_reset_tokens](
	[email] [nvarchar](255) NOT NULL,
	[token] [nvarchar](255) NOT NULL,
	[created_at] [datetime] NULL,
 CONSTRAINT [password_reset_tokens_email_primary] PRIMARY KEY CLUSTERED 
(
	[email] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[rooms]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[rooms](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[deacription] [nvarchar](max) NULL,
	[status] [nvarchar](255) NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[service_counters]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[service_counters](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[service_id] [bigint] NOT NULL,
	[counter_id] [bigint] NOT NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[services]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[services](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[department_id] [bigint] NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[deacription] [nvarchar](max) NULL,
	[image] [nvarchar](max) NULL,
	[status] [nvarchar](255) NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[sessions]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[sessions](
	[id] [nvarchar](255) NOT NULL,
	[user_id] [bigint] NULL,
	[ip_address] [nvarchar](45) NULL,
	[user_agent] [nvarchar](max) NULL,
	[payload] [nvarchar](max) NOT NULL,
	[last_activity] [int] NOT NULL,
 CONSTRAINT [sessions_id_primary] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
/****** Object:  Table [dbo].[tokens]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[tokens](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[department_id] [bigint] NOT NULL,
	[service_id] [bigint] NOT NULL,
	[counter_id] [bigint] NULL,
	[name] [nvarchar](255) NULL,
	[phone] [nvarchar](255) NULL,
	[token_number] [nvarchar](255) NOT NULL,
	[note] [nvarchar](255) NULL,
	[status] [nvarchar](255) NOT NULL,
	[atend_by] [bigint] NULL,
	[call_time] [datetime] NULL,
	[date] [date] NOT NULL,
	[create_by] [bigint] NULL,
	[update_by] [bigint] NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[user_logs]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[user_logs](
	[log_id] [int] IDENTITY(1,1) NOT NULL,
	[user_id] [int] NULL,
	[username] [nvarchar](255) NULL,
	[name] [nvarchar](255) NULL,
	[role_id] [int] NULL,
	[log_message] [nvarchar](255) NULL,
	[created_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[log_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[users]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[users](
	[id] [bigint] IDENTITY(1,1) NOT NULL,
	[username] [nvarchar](255) NOT NULL,
	[employee_id] [nvarchar](255) NOT NULL,
	[name] [nvarchar](255) NOT NULL,
	[role_id] [bigint] NULL,
	[developer] [nvarchar](255) NULL,
	[doctor] [nvarchar](255) NULL,
	[email] [nvarchar](255) NULL,
	[phone] [nvarchar](255) NULL,
	[department_id] [bigint] NULL,
	[service_id] [bigint] NULL,
	[counter_id] [bigint] NULL,
	[room_id] [bigint] NULL,
	[date_of_birth] [date] NULL,
	[note] [nvarchar](max) NULL,
	[gender] [nvarchar](255) NULL,
	[id_card_number] [nvarchar](255) NULL,
	[image] [nvarchar](255) NULL,
	[isban] [nvarchar](255) NOT NULL,
	[last_seen] [datetime] NULL,
	[email_verified_at] [datetime] NULL,
	[password] [nvarchar](255) NOT NULL,
	[signature] [nvarchar](255) NULL,
	[stamp] [nvarchar](255) NULL,
	[remember_token] [nvarchar](100) NULL,
	[created_at] [datetime] NULL,
	[updated_at] [datetime] NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [failed_jobs_uuid_unique]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [failed_jobs_uuid_unique] ON [dbo].[failed_jobs]
(
	[uuid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [jobs_queue_index]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE NONCLUSTERED INDEX [jobs_queue_index] ON [dbo].[jobs]
(
	[queue] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [sessions_last_activity_index]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE NONCLUSTERED INDEX [sessions_last_activity_index] ON [dbo].[sessions]
(
	[last_activity] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
/****** Object:  Index [sessions_user_id_index]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE NONCLUSTERED INDEX [sessions_user_id_index] ON [dbo].[sessions]
(
	[user_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_employee_id_unique]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_employee_id_unique] ON [dbo].[users]
(
	[employee_id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
SET ANSI_PADDING ON
GO
/****** Object:  Index [users_username_unique]    Script Date: 4/21/2025 10:18:03 PM ******/
CREATE UNIQUE NONCLUSTERED INDEX [users_username_unique] ON [dbo].[users]
(
	[username] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, SORT_IN_TEMPDB = OFF, IGNORE_DUP_KEY = OFF, DROP_EXISTING = OFF, ONLINE = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
GO
ALTER TABLE [dbo].[counter_token_calls] ADD  DEFAULT ('complete') FOR [status]
GO
ALTER TABLE [dbo].[counters] ADD  DEFAULT ('active') FOR [status]
GO
ALTER TABLE [dbo].[deleted_service_log] ADD  DEFAULT (getdate()) FOR [deleted_on]
GO
ALTER TABLE [dbo].[departments] ADD  DEFAULT ('active') FOR [status]
GO
ALTER TABLE [dbo].[displays] ADD  DEFAULT ('active') FOR [status]
GO
ALTER TABLE [dbo].[doctor_token_calls] ADD  DEFAULT ('complete') FOR [status]
GO
ALTER TABLE [dbo].[doctor_tokens] ADD  DEFAULT ('pending') FOR [status]
GO
ALTER TABLE [dbo].[failed_jobs] ADD  DEFAULT (getdate()) FOR [failed_at]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('MD Sofiul Bashar') FOR [name]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('Sofiul Ecommerce') FOR [title]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('36981701') FOR [phone]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('mdsofiul1997@gmail.com') FOR [email]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('USD') FOR [currency]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('$') FOR [currency_symbol]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('logo.png') FOR [mane_logo]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('fab-logo.png') FOR [fab_logo]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('stamp.png') FOR [stamp]
GO
ALTER TABLE [dbo].[general_settings] ADD  DEFAULT ('leaveformlogo.png') FOR [leaveform_print_logo]
GO
ALTER TABLE [dbo].[rooms] ADD  DEFAULT ('active') FOR [status]
GO
ALTER TABLE [dbo].[services] ADD  DEFAULT ('active') FOR [status]
GO
ALTER TABLE [dbo].[tokens] ADD  DEFAULT ('pending') FOR [status]
GO
ALTER TABLE [dbo].[user_logs] ADD  DEFAULT (getdate()) FOR [created_at]
GO
ALTER TABLE [dbo].[users] ADD  DEFAULT ('active') FOR [isban]
GO
ALTER TABLE [dbo].[doctor]  WITH CHECK ADD  CONSTRAINT [FK_doctor_departments] FOREIGN KEY([dept_id])
REFERENCES [dbo].[departments] ([id])
GO
ALTER TABLE [dbo].[doctor] CHECK CONSTRAINT [FK_doctor_departments]
GO
ALTER TABLE [dbo].[counters]  WITH CHECK ADD CHECK  (([status]=N'inactive' OR [status]=N'active'))
GO
ALTER TABLE [dbo].[departments]  WITH CHECK ADD CHECK  (([status]=N'inactive' OR [status]=N'active'))
GO
ALTER TABLE [dbo].[displays]  WITH CHECK ADD CHECK  (([status]=N'inactive' OR [status]=N'active'))
GO
ALTER TABLE [dbo].[rooms]  WITH CHECK ADD CHECK  (([status]=N'inactive' OR [status]=N'active'))
GO
ALTER TABLE [dbo].[services]  WITH CHECK ADD CHECK  (([status]=N'inactive' OR [status]=N'active'))
GO
ALTER TABLE [dbo].[users]  WITH CHECK ADD CHECK  (([isban]=N'inactive' OR [isban]=N'active'))
GO
/****** Object:  StoredProcedure [dbo].[sp_insert_service]    Script Date: 4/21/2025 10:18:03 PM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE PROCEDURE [dbo].[sp_insert_service]
    @department_id INT,
    @name NVARCHAR(100),
    @description NVARCHAR(MAX),
    @image NVARCHAR(255),
    @status BIT,
    @create_by NVARCHAR(50),
    @update_by NVARCHAR(50)
AS
BEGIN
    SET NOCOUNT ON;

    INSERT INTO service (
        department_id, name, description, image,
        status, create_by, update_by, created_at, updated_at
    )
    VALUES (
        @department_id, @name, @description, @image,
        @status, @create_by, @update_by, GETDATE(), GETDATE()
    );
END;
GO
USE [master]
GO
ALTER DATABASE [etoken] SET  READ_WRITE 
GO
