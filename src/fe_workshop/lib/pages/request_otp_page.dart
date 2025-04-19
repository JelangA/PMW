import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/desktop/request_otp_desktop_page.dart';
import 'package:frontend/pages/mobile/request_otp_mobile_page.dart';
import 'package:frontend/widgets/responsive_layout_widget.dart';

class RequestOtpPage extends StatefulWidget {
  const RequestOtpPage({super.key});

  @override
  State<RequestOtpPage> createState() => _RequestOtpPageState();
}

class _RequestOtpPageState extends State<RequestOtpPage> {
  @override
  Widget build(BuildContext context) {
    return Title(
      title: 'PMW WORKSHOP POLBAN | Lupa Kata Sandi',
      color: white,
      child: const ResponsiveLayoutWidget(
        mobileBody: RequestOtpMobilePage(),
        desktopBody: RequestOtpDesktopPage(),
      ),
    );
  }
}