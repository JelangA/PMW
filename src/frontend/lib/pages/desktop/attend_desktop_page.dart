import 'package:flutter/material.dart';
import 'package:frontend/common/constant.dart';
import 'package:frontend/providers/attendance_provider.dart';
import 'package:frontend/providers/user_provider.dart';
import 'package:frontend/providers/workshop_provider.dart';
import 'package:frontend/widgets/custom_button_widget.dart';
import 'package:frontend/widgets/custom_dropdown_button_form_field_widget.dart';
import 'package:frontend/widgets/custom_text_form_field_widget.dart';
import 'package:frontend/widgets/snackbar_widget.dart';
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

  void guardedSnackbar(String message, Color color) {
    showSnackBar(
      context,
      message,
      color,
    );
  }

  void checkIn(
    AttendanceProvider attendanceProvider,
    String workshopId,
    String nim,
  ) async {
    if (workshopId.isNotEmpty) {
      try {
        if (await attendanceProvider.checkIn(nim)) {
          guardedSnackbar(
            "Berhasil presensi awal.",
            Colors.green,
          );
        } else {
          guardedSnackbar(
            "${attendanceProvider.attendanceModel?.message}",
            Colors.red,
          );
        }
      } catch (e) {
        guardedSnackbar(
          "Terjadi kesalahan: ${attendanceProvider.attendanceModel?.message}",
          Colors.red,
        );
      }
    } else {
      guardedSnackbar(
        "Isi semua data.",
        Colors.red,
      );
    }
  }

  void checkOut(
    AttendanceProvider attendanceProvider,
    String workshopId,
    String nim,
  ) async {
    if (workshopId.isNotEmpty) {
      try {
        if (await attendanceProvider.checkOut(nim)) {
          guardedSnackbar(
            "Berhasil presensi akhir.",
            Colors.green,
          );
        } else {
          guardedSnackbar(
            "${attendanceProvider.attendanceModel?.message}.",
            Colors.red,
          );
        }
      } catch (e) {
        guardedSnackbar(
          "Terjadi kesalahan: ${attendanceProvider.attendanceModel?.message}",
          Colors.red,
        );
      }
    } else {
      guardedSnackbar(
        "Isi semua data.",
        Colors.red,
      );
    }
  }

  @override
  Widget build(BuildContext context) {
    WidgetsBinding.instance.addPostFrameCallback((timestamp) {
      Provider.of<UserProvider>(
        context,
        listen: false,
      ).getProfileUser();
      Provider.of<WorkshopProvider>(
        context,
        listen: false,
      ).getAllWorkshop();
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
              child: SingleChildScrollView(
                physics: const BouncingScrollPhysics(),
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
                    Consumer3<WorkshopProvider, AttendanceProvider,
                        UserProvider>(
                      builder: (
                        context,
                        workshopProvider,
                        attendanceProvider,
                        userProvider,
                        child,
                      ) {
                        return CustomDropdownButtonFormFieldWidget(
                          hintText: "Pilih Workshop",
                          items: workshopProvider.workshopModel,
                          onChanged: (value) async {
                            final workshop =
                                workshopProvider.workshopModel.firstWhere(
                              (element) => element.title == value,
                            );

                            workshopProvider.setSelectedWorkshop(workshop.id);
                            await attendanceProvider
                                .setWorkshopId(workshop.id.toString());
                            await attendanceProvider.checkAttendanceStatus(
                                userProvider.userModel!.nim.toString());
                          },
                        );
                      },
                    ),
                    SizedBox(
                      height: defaultPadding,
                    ),
                    Consumer2<AttendanceProvider, UserProvider>(
                      builder:
                          (context, attendanceProvider, userProvider, child) {
                        final attendance = attendanceProvider.attendanceModel;

                        if (attendance?.checkInTime != null &&
                            attendance?.checkOutTime != null) {
                          return CustomButtonWidget(
                            text:
                                "Kamu telah presensi awal pada ${attendance!.checkInTime}\ndan presensi akhir pada ${attendance.checkOutTime}",
                            onPressed: () {},
                            color: greenColor,
                            height: 70,
                            width: double.maxFinite,
                            isLoading: attendanceProvider.isLoading,
                          );
                        } else if (attendance?.checkInTime == null) {
                          return CustomButtonWidget(
                            text: "Presensi Awal Sekarang!",
                            onPressed: () {
                              checkIn(
                                attendanceProvider,
                                attendanceProvider.workshopId!,
                                userProvider.userModel!.nim!,
                              );
                            },
                            color: primaryColor,
                            height: 70,
                            width: double.maxFinite,
                            isLoading: attendanceProvider.isLoading,
                          );
                        } else {
                          return CustomButtonWidget(
                            text: "Presensi Akhir Sekarang!",
                            onPressed: () {
                              checkOut(
                                attendanceProvider,
                                attendanceProvider.workshopId!,
                                userProvider.userModel!.nim!,
                              );
                            },
                            color: primaryColor,
                            height: 70,
                            width: double.maxFinite,
                            isLoading: attendanceProvider.isLoading,
                          );
                        }
                      },
                    ),
                  ],
                ),
              ),
            ),
          ),
        ],
      ),
    );
  }
}
