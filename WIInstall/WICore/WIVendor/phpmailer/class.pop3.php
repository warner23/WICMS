 /**
     * The PHPMailer SMTP version number.
     * @type string
     */
    const VERSION = '5.2.7';

    /**
     * SMTP line break constant.
     * @type string
     */
    const CRLF = "\r\n";

    /**
     * The SMTP port to use if one is not specified.
     * @type int
     */
    const DEFAULT_SMTP_PORT = 25;

    /**
     * The maximum line length allowed by RFC 2822 section 2.1.1
     * @type int
     */
    const MAX_LINE_LENGTH = 998;

    /**
     * The PHPMailer SMTP Version number.
     * @type string
     * @deprecated Use the constant instead
     * @see SMTP::VERSION
     */
    public $Version = '5.2.7';

    /**
     * SMTP server port number.
     * @type int
     * @deprecated This is only ever used as a default value, so use the constant instead
     * @see SMTP::DEFAULT_SMTP_PORT
     */
    public $SMTP_PORT = 25;

    /**
     * SMTP reply line ending.
     * @type string
     * @deprecated Use the constant instead
     * @see SMTP::CRLF
     */
    public $CRLF = "\r\n";

    /**
     * Debug output level.
     * Options:
     * * `0` No output
     * * `1` Commands
     * * `2` Data and commands
     * * `3` As 2 plus connection status
     * * `4` Low-level data output
     * @type int
     */
    public $do_debug = 0;

    /**
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to <br>, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     * @type string
     */
    public $Debugoutput = 'echo';

    /**
     * Whether to use VERP.
     * @link http://en.wikipedia.org/wiki/Variable_envelope_return_path
     * @link http://www.postfix.org/VERP_README.html Info on VERP
     * @type bool
     */
    public $do_verp = false;

    /**
     * The timeout value for connection, in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * This needs to be quite high to function correctly with hosts using greetdelay as an anti-spam measure.
     * @link http://tools.ietf.org/html/rfc2821#section-4.5.3.2
     * @type int
     */
    public $Timeout = 300;

    /**
     * The SMTP timelimit value for reads, in seconds.
     * @type int
     */
    public $Timelimit = 30;

    /**
     * The socket for the server connection.
     * @type resource
     */
    protected $smtp_conn;

    /**
     * Error message, if any, for the last call.
     * @type string
     */
    protected $error = '';

    /**
     * The reply the server sent to us for HELO.
     * @type string
     */
    protected $helo_rply = '';

    /**
     * The most recent reply received from the server.
     * @type string
     */
    protected $last_reply = '';

    /**
     * Constructor.
     * @access public
     */
    public function __construct()
    {
        $this->smtp_conn = 0;
        $this->error = null;
        $this->helo_rply = null;
        $this->do_debug = 0;
    }

    /**
     * Output debugging info via a user-selected method.
     * @param string $str Debug string to output
     * @return void
     */
    protected function edebug($str)
    {
        switch ($this->Debugoutput) {
            case 'error_log':
                //Don't output, just log
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking, HTML-safe output
                echo htmlentities(
                    preg_replace('/[\r\n]+/', '', $str),
                    ENT_QUOTES,
                    'UTF-8'
                )
                . "<br>\n";
                break;
            case 'echo':
            default:
                echo gmdate('Y-m-d H:i:s')."\t".trim($str)."\n";
        }
    }

       * @type bool
     */
    public $do_verp = false;

    /**
     * Whether to allow sending messages with an empty body.
     * @type bool
     */
    public $AllowEmpty = false;

    /**
     * The default line ending.
     * @note The default remains "\n". We force CRLF where we know
     *        it must be used via self::CRLF.
     * @type string
     */
    public $LE = "\n";

    /**
     * DKIM selector.
     * @type string
     */
    public $DKIM_selector = '';

    /**
     * DKIM Identity.
     * Usually the email address used as the source of the email
     * @type string
     */
    public $DKIM_identity = '';

    /**
     * DKIM passphrase.
     * Used if your key is encrypted.
     * @type string
     */
    public $DKIM_passphrase = '';

    /**
     * DKIM signing domain name.
     * @example 'example.com'
     * @type string
     */
    public $DKIM_domain = '';

    /**
     * DKIM private key file path.
     * @type string
     */
    public $DKIM_private = '';

    /**
     * Callback Action function name.
     *
     * The function that handles the result of the send email action.
     * It is called out by send() for each email sent.
     *
     * Value can be any php callable: http://www.php.net/is_callable
     *
     * Parameters:
     *   bool    $result        result of the send action
     *   string  $to            email address of the recipient
     *   string  $cc            cc email addresses
     *   string  $bcc           bcc email addresses
     *   string  $subject       the subject
     *   string  $body          the email body
     *   string  $from          email address of sender
     * @type string
     */
    public $action_function = '';

    /**
     * What to use in the X-Mailer header.
     * Options: null for default, whitespace for none, or a string to use
     * @type string
     */
    public $XMailer = '';

    /**
     * An instance of the SMTP sender class.
     * @type SMTP
     * @access protected
     */
    protected $smtp = null;

    /**
     * The array of 'to' addresses.
     * @type array
     * @access protected
     */
    protected $to = array();

    /**
     * The array of 'cc' addresses.
     * @type array
     * @access protected
     */
    protected $cc = array();

    /**
     * The array of 'bcc' addresses.
     * @type array
     * @access protected
     */
    protected $bcc = array();

    /**
     * The array of reply-to names and addresses.
     * @type array
     * @access protected
     */
    protected $ReplyTo = array();

    /**
     * An array of all kinds of addresses.
     * Includes all of $to, $cc, $bcc, $replyto
     * @type array
     * @access protected
     */
    protected $all_recipients = array();

    /**
     * The array of attachments.
     * @type array
     * @access protected
     */
    protected $attachment = array();

    /**
     * The array of custom headers.
     * @type array
     * @access protected
     */
    protected $CustomHeader = array();

    /**
     * The most recent Message-ID (including angular brackets).
     * @type string
     * @access protected
     */
    protected $lastMessageID = '';

    /**
     * The message's MIME type.
     * @type string
     * @access protected
     */
    protected $message_type = '';

    /**
     * The array of MIME boundary strings.
     * @type array
     * @access protected
     */
    protected $boundary = array();

    /**
     * The array of available languages.
     * @type array
     * @access protected
     */
    protected $language = array();

    /**
     * The number of errors encountered.
     * @type integer
     * @access protected
     */
    protected $error_count = 0;

    /**
     * The S/MIME certificate file path.
     * @type string
     * @access protected
     */
    protected $sign_cert_file = '';

    /**
     * The S/MIME key file path.
     * @type string
     * @access protected
     */
    protected $sign_key_file = '';

    /**
     * The S/MIME password for the key.
     * Used only if the key is encrypted.
     * @type string
     * @access protected
     */
    protected $sign_key_pass = '';

    /**
     * Whether to throw exceptions for errors.
     * @type bool
     * @access protected
     */
    protected $exceptions = false;

    /**
     * Error severity: message only, continue processing
     */
    const STOP_MESSAGE = 0;

    /**
     * Error severity: message, likely ok to continue processing
     */
    const STOP_CONTINUE = 1;

    /**
     * Error severity: message, plus full stop, critical error reached
     */
    const STOP_CRITICAL = 2;

    /**
     * SMTP RFC standard line ending
     */
    const CRLF = "\r\n";

    /**
     * Constructor
     * @param bool $exceptions Should we throw external exceptions?
     */
    public function __construct($exceptions = false)
    {
        if (version_compare(PHP_VERSION, '5.0.0', '<')) {
            exit("Sorry, PHPMailer will only run on PHP version 5 or greater!\n");
        }
        $this->exceptions = ($exceptions == true);
        //Make sure our autoloader is loaded
        if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
            $autoload = spl_autoload_functions();
            if ($autoload === false or !in_array('PHPMailerAutoload', $autoload)) {
                require 'PHPMailerAutoload.php';
            }
        }
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        if ($this->Mailer == 'smtp') { //close any open SMTP connection nicely
            $this->smtpClose();
        }
    }

    /**
     * Call mail() in a safe_mode-aware fashion.
     * Also, unless sendmail_path points to sendmail (or something that
     * claims to be sendmail), don't pass params (not a perfect fix,
     * but it will do)
     * @param string $to To
     * @param string $subject Subject
     * @param string $body Message Body
     * @param string $header Additional Header(s)
     * @param string $params Params
     * @access private
     * @return bool
     */
    private function mailPassthru($to, $subject, $body, $header, $params)
    {
        //Check overloading of mail function to avoid double-encoding
        if (ini_get('mbstring.func_overload') & 1) {
            $subject = $this->secureHeader($subject);
        } else {
            $subject = $this->encodeHeader($this->secureHeader($subject));
        }
        if (ini_get('safe_mode') || !($this->UseSendmailOptions)) {
            $result = @mail($to, $subject, $body, $header);
        } else {
            $result = @mail($to, $subject, $body, $header, $params);
        }
        return $result;
    }

    /**
     * Output debugging info via user-defined method.
     * Only if debug output is enabled.
     * @see PHPMailer::$Debugoutput
     * @see PHPMailer::$SMTPDebug
     * @param string $str
     */
    protected function edebug($str)
    {
        if (!$this->SMTPDebug) {
            return;
        }
        switch ($this->Debugoutput) {
            case 'error_log':
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking display that's HTML-safe
                echo htmlentities(preg_replace('/[\r\n]+/', '', $str), ENT_QUOTES, $this->Char