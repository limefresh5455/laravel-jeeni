@if(isset($user))
    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation" style="background:#323230;background-color:#323230;width:100%;">
        <tbody>
        <tr>
            <td style="direction:ltr;font-size:0px;padding:20px 0;text-align:center;">
                <!--[if mso | IE]><table role="presentation" border="0" cellpadding="0" cellspacing="0"><tr><td class="" style="vertical-align:top;width:600px;" ><![endif]-->
                <div class="mj-column-per-100 mj-outlook-group-fix" style="font-size:0px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" role="presentation" style="vertical-align:top;" width="100%">
                        <tbody>
                        <tr>
                            <td align="left" style="font-size:0px;padding:10px 25px;word-break:break-word;">
                                <div style="font-family:Arial;font-size:16px;font-weight:normal;line-height:22px;text-align:left;color:#bdbdbd;">You have received this email as s Jeeni member, or because you are on a JEENI opt-in mailing list. To stop receiving future emails unsubscribe
                                    <a href="{{ $user->getUnSubscribeLink() }}"
                                       style="text-decoration: underline; color: #bdbdbd; font-weight: bold; ">HERE</a>.
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--[if mso | IE]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
    </table>
@endif
