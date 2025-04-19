import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/desktop/sign_up_desktop_page.dart';
import 'package:frontend/pages/mobile/sign_up_mobile_page.dart';
import 'package:frontend/widgets/responsive_layout_widget.dart';

class SignUpPage extends StatelessWidget {
  const SignUpPage({super.key});

  @override
  Widget build(BuildContext context) {
   return Title(
    title: 'PMW WORKSHOP POLBAN | Sign Up',
      color: white,
     child: const ResponsiveLayoutWidget(
        mobileBody: SignUpMobilePage(),
        desktopBody: SignUpDesktopPage(),
      ),
   );
  }
}