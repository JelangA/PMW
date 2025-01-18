import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/widgets/custom_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';

class AttendMobilePage extends StatefulWidget {
  const AttendMobilePage({super.key});

  @override
  State<AttendMobilePage> createState() => _AttendMobilePageState();
}

class _AttendMobilePageState extends State<AttendMobilePage> {
  TextEditingController nameController = TextEditingController();
  TextEditingController nimController = TextEditingController();
  TextEditingController departmentProgramStudyController =
      TextEditingController();
  TextEditingController emailController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: white,
      body: Stack(
        children: [
          SizedBox(
            height: height(context),
            width: width(context),
            child: Image.asset(
              "assets/png/pmw-poster.png",
              fit: BoxFit.cover,
            ),
          ),
          Align(
            alignment: Alignment.center,
            child: Wrap(
              children: [
                Container(
                  padding: EdgeInsets.all(defaultPadding),
                  width: height(context) * 0.5,
                  decoration: BoxDecoration(
                    color: white,
                    borderRadius: BorderRadius.circular(defaultBorderRadius),
                  ),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      SizedBox(
                        height: height(context) * 0.1,
                      ),
                      Center(
                        child: Text(
                          "Rekaman Data",
                          style: primaryTextStyle.copyWith(
                            fontWeight: bold,
                            fontSize: 20,
                          ),
                        ),
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      CustomTextFormFieldWidget(
                        label: "Nama lengkap",
                        hintText: "John Doe",
                        controller: nameController,
                        isEnabled: false,
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      CustomTextFormFieldWidget(
                        label: "NIM",
                        hintText: "231524008",
                        controller: nimController,
                        isEnabled: false,
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      CustomTextFormFieldWidget(
                        label: "Jurusan - Prodi",
                        hintText: "Teknik Komputer - D4 Teknik Informatika",
                        controller: departmentProgramStudyController,
                        isEnabled: false,
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      CustomTextFormFieldWidget(
                        label: "Alamat email",
                        hintText: "user@example.com",
                        controller: emailController,
                        isEnabled: false,
                      ),
                      SizedBox(
                        height: defaultPadding,
                      ),
                      CustomButtonWidget(
                        text:
                            "Kamu telah presensi awal pada\n22 Nov 2024 10:17:43",
                        onPressed: () {},
                        color: greenColor,
                        height: 70,
                        width: double.maxFinite,
                      ),
                    ],
                  ),
                ),
              ],
            ),
          ),
        ],
      ),
    );
  }
}
