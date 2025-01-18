import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/desktop/sign_in_desktop_page.dart';
import 'package:frontend/pages/mobile/sign_in_mobile_page.dart';
import 'package:frontend/widgets/responsive_layout_widget.dart';

class SignInPage extends StatelessWidget {
  const SignInPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Title(
      title: 'PMW WORKSHOP POLBAN | Sign In',
      color: white,
      child: const ResponsiveLayoutWidget(
        mobileBody: SignInMobilePage(),
        desktopBody: SignInDesktopPage(),
      ),
    );
  }
}
