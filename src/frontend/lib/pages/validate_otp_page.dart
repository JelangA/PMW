import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/desktop/validate_otp_desktop_page.dart';
import 'package:frontend/pages/mobile/validate_otp_mobile_page.dart';
import 'package:frontend/widgets/responsive_layout_widget.dart';

class ValidateOtpPage extends StatefulWidget {
  const ValidateOtpPage({super.key,
    required this.email,
  });

  final String email;

  @override
  State<ValidateOtpPage> createState() => _ValidateOtpPageState();
}

class _ValidateOtpPageState extends State<ValidateOtpPage> {
  @override
  Widget build(BuildContext context) {
    return Title(
      title: 'PMW WORKSHOP POLBAN | Ubah Kata Sandi',
      color: white,
      child: ResponsiveLayoutWidget(
        mobileBody: ValidateOtpMobilePage(email: widget.email),
        desktopBody: ValidateOtpDesktopPage(email: widget.email,),
      ),
    );
  }
}