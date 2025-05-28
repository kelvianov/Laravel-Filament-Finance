<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="color-scheme" content="light">
    <meta name="supported-color-schemes" content="light">
    <style>
        /* Reset & base */
        body, table, td, a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            color: #334155;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            min-height: 100vh;
        }
        
        a {
            color: #3b82f6;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        
        a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        
        .wrapper {
            width: 100%;
            padding: 40px 20px;
            background: transparent;
        }
        
        .content {
            max-width: 600px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.08),
                0 4px 12px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            border: 1px solid #e2e8f0;
            position: relative;
        }
        
        .content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6 0%, #6366f1 50%, #8b5cf6 100%);
        }
        
        .header {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 50%, #374151 100%);
            color: #ffffff;
            font-weight: 800;
            font-size: 32px;
            text-align: center;
            padding: 40px 30px;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-family: 'Inter', system-ui, sans-serif;
            user-select: none;
            position: relative;
            overflow: hidden;
        }
        
        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: shimmer 3s ease-in-out infinite;
        }
        
        @keyframes shimmer {
            0%, 100% { transform: translateX(-100%) translateY(-100%) rotate(0deg); }
            50% { transform: translateX(0%) translateY(0%) rotate(180deg); }
        }
        
        .body {
            padding: 40px 32px;
            color: #374151;
            line-height: 1.7;
            font-size: 16px;
        }
        
        .body h2 {
            color: #1e293b;
            font-size: 20px;
            font-weight: 600;
            margin: 0 0 16px 0;
        }
        
        .body p {
            margin: 0 0 16px 0;
        }
        
        .body p:last-child {
            margin-bottom: 0;
        }
        
        .button {
            display: inline-block;
            color: #ffffff !important;
            font-weight: 600;
            padding: 16px 40px;
            border-radius: 10px;
            text-align: center;
            margin: 30px 0;
            font-size: 16px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 
                0 10px 25px rgba(59, 130, 246, 0.3),
                0 4px 12px rgba(59, 130, 246, 0.2);
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border: none;
            position: relative;
            overflow: hidden;
        }
        
        .button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }
        
        .button:hover {
            box-shadow: 
                0 15px 35px rgba(29, 78, 216, 0.4),
                0 6px 20px rgba(29, 78, 216, 0.3);
            transform: translateY(-2px);
            text-decoration: none;
        }
        
        .button:hover::before {
            left: 100%;
        }
        
        .button:active {
            transform: translateY(0px);
        }
        
        .social-links {
            text-align: center;
            padding: 32px 24px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
        }
        
        .social-links h3 {
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            margin: 0 0 16px 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .social-icons {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
        }
        
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
            text-decoration: none;
        }
        
        .social-icon:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            text-decoration: none;
        }
        
        .social-icon img {
            width: 32px;
            height: 32px;
            border-radius: 4px;
        }
        
        /* Perbesar icon GitHub */
        .social-icon.github img {
            width: 45px;
            height: 45px;
            border-radius: 6px;
        }
        
        .footer {
            text-align: center;
            padding: 24px 32px;
            font-size: 13px;
            color: #64748b;
            background: #f1f5f9;
            border-top: 1px solid #e2e8f0;
            font-weight: 500;
        }
        
        /* Responsive design */
        @media only screen and (max-width: 600px) {
            .wrapper { 
                padding: 20px 12px !important; 
            }
            
            .content { 
                width: 100% !important; 
                border-radius: 12px !important; 
                margin: 0 !important;
            }
            
            .header {
                padding: 30px 20px !important;
                font-size: 24px !important;
                letter-spacing: 1px !important;
            }
            
            .body { 
                padding: 32px 24px !important; 
                font-size: 15px !important; 
            }
            
            .button { 
                width: 100% !important; 
                padding: 16px 0 !important; 
                font-size: 16px !important; 
                margin: 20px 0 !important;
                box-sizing: border-box;
            }
            
            .social-links {
                padding: 24px 20px !important;
            }
            
            .social-icons {
                gap: 12px !important;
            }
            
            .footer { 
                padding: 20px 24px !important; 
                font-size: 12px !important; 
            }
        }
        
        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            body {
                background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            }
            
            .content {
                background: #1e293b;
                border-color: #334155;
            }
            
            .body {
                color: #e2e8f0;
            }
            
            .body h2 {
                color: #f1f5f9;
            }
            
            .social-links {
                background: #334155;
                border-top-color: #475569;
            }
            
            .social-links h3 {
                color: #94a3b8;
            }
            
            .social-icon {
                background: #475569;
            }
            
            .footer {
                background: #0f172a;
                color: #94a3b8;
                border-top-color: #334155;
            }
        }
    </style>
    {!! $head ?? '' !!}
</head>

<body>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" cellpadding="0" cellspacing="0" role="presentation">
                    <!-- Header -->
                    <tr>
                        <td class="header">
                            FINANCE TRACKER
                        </td>
                    </tr>

                    <!-- Body -->
                    <tr>
                        <td class="body">
                            @php
                                $content = $slot;
                                $content = preg_replace('/^\s*#+\s*Hello!?\s*$/mi', '', $content);
                                $content = preg_replace('/^\s*User[:,]?\s*$/mi', '', $content);
                                $content = str_replace('Laravel', 'Finance Tracker', $content);
                            @endphp

                            {!! Illuminate\Mail\Markdown::parse($content) !!}
                        </td>
                    </tr>

                    <!-- Social Links -->
                  <!-- Social Links -->
<tr>
    <td class="social-links">
        <h3>Connect with Us</h3>
        <table role="presentation" align="center" cellpadding="0" cellspacing="0" style="margin: 0 auto;">
            <tr>
                <td align="center" style="padding: 0 10px;">
                    <a href="https://portofolio-rho-azure.vercel.app/" target="_blank" aria-label="Vercel">
                         <img src="{{ asset('images/vercel.png') }}"
                             alt="Vercel" width="32" height="32" style="display: block; border: 0;" />
                    </a>
                </td>
                <td align="center" style="padding: 0 10px;">
                    <a href="https://github.com/kelvianov" target="_blank" aria-label="GitHub">
                         <img src="{{ asset('images/github.png') }}"
                             alt="GitHub" width="42" height="42" style="display: block; border: 0;" />
                    </a>
                </td>
                <td align="center" style="padding: 0 10px;">
                    <a href="https://www.instagram.com/kelvianov/" target="_blank" aria-label="Instagram">
                        <img src="{{ asset('images/instagram.png') }}"
                             alt="Instagram" width="35 height="35" style="display: block; border: 0;" />
                    </a>
                </td>
            </tr>
        </table>
    </td>
</tr>


                    <!-- Footer -->
                    <tr>
                        <td class="footer">
                            &copy; {{ date('Y') }} Finance Tracker. {{ __('All rights reserved.') }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
