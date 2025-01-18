import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/user_provider.dart';
import 'package:frontend/widgets/custom_button_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:provider/provider.dart';

class AttendDesktopPage extends StatefulWidget {
  const AttendDesktopPage({super.key});

  @override
  State<AttendDesktopPage> createState() => _AttendDesktopPageState();
}

class _AttendDesktopPageState extends State<AttendDesktopPage> {
  TextEditingController nameController = TextEditingController();
  TextEditingController nimController = TextEditingController();
  TextEditingController departmentProgramStudyController =
      TextEditingController();
  TextEditingController emailController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    WidgetsBinding.instance.addPostFrameCallback((timestamp) {
      Provider.of<UserProvider>(
        context,
        listen: false,
      ).getProfileUser();
    });

    return Scaffold(
      backgroundColor: white,
      body: Row(
        children: [
          Expanded(
            flex: 5,
            child: Image.asset(
              "assets/png/pmw-poster.png",
              fit: BoxFit.cover,
            ),
          ),
          Expanded(
            flex: 5,
            child: Container(
              padding: const EdgeInsets.all(100),
              decoration: BoxDecoration(
                color: white,
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
                  Consumer<UserProvider>(
                    builder: (context, userProvider, child) {
                      return CustomTextFormFieldWidget(
                        label: "NIM",
                        hintText: userProvider.userModel?.nim ?? "",
                        controller: nimController,
                        isEnabled: false,
                      );
                    },
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  Consumer<UserProvider>(
                    builder: (context, userProvider, child) {
                      return CustomTextFormFieldWidget(
                        label: "Nama lengkap",
                        hintText: userProvider.userModel?.name ?? "",
                        controller: nameController,
                        isEnabled: false,
                      );
                    },
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  Consumer<UserProvider>(
                    builder: (context, userProvider, child) {
                      return CustomTextFormFieldWidget(
                        label: "Jurusan - Prodi",
                        hintText:
                            "${userProvider.userModel?.major ?? ""} - ${userProvider.userModel?.programStudy ?? ""}",
                        controller: departmentProgramStudyController,
                        isEnabled: false,
                      );
                    },
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  Consumer<UserProvider>(
                    builder: (context, userProvider, child) {
                      return CustomTextFormFieldWidget(
                        label: "Alamat email",
                        hintText: userProvider.userModel?.email ?? "",
                        controller: emailController,
                        isEnabled: false,
                      );
                    },
                  ),
                  SizedBox(
                    height: defaultPadding,
                  ),
                  CustomButtonWidget(
                    text: "Kamu telah presensi awal pada\n22 Nov 2024 10:17:43",
                    onPressed: () {},
                    color: greenColor,
                    height: 70,
                    width: double.maxFinite,
                  ),
                ],
              ),
            ),
          ),
        ],
      ),
    );
  }
}
