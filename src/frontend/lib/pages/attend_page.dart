import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/pages/desktop/attend_desktop_page.dart';
import 'package:frontend/pages/mobile/attend_mobile_page.dart';
import 'package:frontend/widgets/responsive_layout_widget.dart';

class AttendPage extends StatelessWidget {
  const AttendPage({super.key});

  @override
  Widget build(BuildContext context) {
    return Title(
      title: 'PMW WORKSHOP POLBAN | Presensi',
      color: white,
      child: const ResponsiveLayoutWidget(
        mobileBody: AttendMobilePage(),
        desktopBody: AttendDesktopPage(),
      ),
    );
  }
}
