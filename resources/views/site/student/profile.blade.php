@extends('layouts.frontend.v2index')
@section('content')

    <section id="features" class="features">
      <div class="container" data-aos="fade-up">
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <div class="container-center-horizontal">
  <div class="desktop1280dashboard screen" data-id="F9280968-D292-4835-9E87-00B69AE6BC74">
    <div class="side-bar-desktop" data-id="View_54c1b804-306d-45d8-b9ab-082fbab83fbc">
      <div class="side-bar-desktop-1" data-id="View_82f90e00-cf4a-4b71-a1d2-ed212c87271d">
        <a href="desktop1280dashboard.html">
          <div class="dashboard-icon" data-id="View_579c142e-6517-4704-a6d9-e885835a407e">
            <div class="hover-bg smart-layers-pointers" data-id="View_697b24ec-8935-434e-9350-45ab660132de"></div></div
        ></a>
        <div class="classes-icon" data-id="View_5da88c74-acdc-4a4d-a823-cfc97cbfb800">
          <div
            class="hover-bg-1 smart-layers-pointers hidden"
            data-id="View_54e4327a-214f-48d5-8c41-a6687f84809c"
          ></div>
        </div>
        <div class="contacts-icon" data-id="View_b94511bc-051d-41eb-a784-f00856b333e6"></div>
        <div class="calendar-icon" data-id="View_c2f8c7c4-0ab9-44e2-880c-d8fbf143c5d0"></div>
        <div class="setting-icons" data-id="View_6dcaf5be-fe72-4cab-a792-6cb3f650f43c"></div>
      </div>
    </div>
    <div class="flex-col-1" data-id="an|RQ8FkBnz">
      
      <div class="dashboard" data-id="View_f425018d-83b9-4acb-8124-5bdc657d04b6">
        <div class="flex-col-2" data-id="an|8DlJS1xh">
          <div
            class="dashboard-1 castoro-regular-normal-black-16px"
            data-id="Label_ba2ccee8-a0bb-49e2-b2c1-0484f4e33d4b"
          >
          </div>
          <div class="welcome-tab-desktop" data-id="View_d08a7cae-92c3-4aee-b333-0ebb2c79405c">
            <div class="welcome-card-desktop" data-id="View_74b28eaf-f30a-47c6-8ce0-51e12e15147a">
              <div class="overlap-group1" data-id="an|8n5jM9PW">
                <div class="overlap-group-2" data-id="an|B0lcsufR">
                  <img
                    class="illustration"
                    data-id="image_95a24b32-5fc1-43b4-a52f-43892ac540a9"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ffef848b3c731ad2c68c453/img/desktop-1280---dashboard--illustration-CAA95525-9E2E-444D-B1A8-F82CBE547746@2x.jpg"
                  />
                  <div class="subtitle lato-light-black-18px" data-id="Label_8ca3f46b-bf31-4cf8-a4a9-9838b46faf45">
                    You Can change our profile in this page,<br />Welcome!
                  </div>
                </div>
                <h1
                  class="title-2 castoro-regular-normal-black-40px"
                  data-id="Label_cb8ace98-3a45-490f-be1c-e4d70da28b88"
                >
                  Hi, {{Auth::user()->first_name}}
                </h1>
              </div>
            </div>
          </div>
          <div class="flex-row" data-id="an|6x5gXJKN">
            <div class="daily-target-tab" data-id="View_68a93a6c-cfe5-4ed3-9494-97d3d3206c01"></div>
            <div class="weekly-target-tab" data-id="View_b517c24c-6a06-43c9-97f6-987e8e7d0438"></div>
            <div class="workout-classes-tab" data-id="View_b05a6d4e-09c6-4779-9614-5b7614518d33"></div>
          </div>
          <div class="flex-row" data-id="an|ukVy9EON">
            <div class="weekly-activity-card-desktop" data-id="View_a61f0a98-38e3-4dee-9b52-df422d8f891d">
              <div class="overlap-group3" data-id="an|GrMSooz2">
                <div class="weekly-activity-card-desktop-1" data-id="View_3b2888ab-4fbe-4dd5-9a21-d582674cb249">
                  <div class="title-3 lato-normal-black-16px" data-id="Label_b4d54b98-5d05-4bb1-b23e-46f137a9ba5f">
                    Weekly Activity
                  </div>
                  <img
                    class="graph-parameters-1"
                    data-id="image_d8434b07-96bf-433c-a4e8-f3bd9250aeaf"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--graph-parameters-1-D6341859-7A32-4FDE-B069-56416A018C0A@2x.png"
                  />
                  <div class="graph-parameters-2" data-id="View_07afc4ac-1b0e-49b3-b844-2bef93d08fbb">
                    <div class="rectangle-1" data-id="View_0c3cfe6b-c576-462a-9bb6-b13ade028582"></div>
                    <div
                      class="this-week mulish-regular-normal-black-8px"
                      data-id="Label_ae1efeff-0197-4b39-8602-baf280ccaebd"
                    >
                      This week
                    </div>
                    <div class="rectangle-2" data-id="View_813a9a56-83ea-4ac5-b01d-3846bf6ba971"></div>
                    <div
                      class="last-week mulish-regular-normal-black-8px"
                      data-id="Label_144f4f62-dd14-4452-81b4-eddf3ef609d0"
                    >
                      Last week
                    </div>
                  </div>
                </div>
                <div class="group-6 smart-layers-pointers hidden" data-id="View_42ee6c5a-a4ab-4325-b934-12c02d7e1ce6">
                  <div class="overlap-group" data-id="an|unmoEzAe">
                    <div class="overlap-group" data-id="an|C1CzvNoX">
                      <div class="rectangle" data-id="View_f8ed1669-a5a7-4799-9355-7ac8e0cfb083"></div>
                      <img
                        class="triangle"
                        data-id="image_e55896ad-d988-4004-aef1-6263aab8336d"
                        src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--triangle-4A30F927-8DCF-429E-95BF-0E960D703466@2x.png"
                      />
                    </div>
                    <div class="title lato-normal-white-12px" data-id="Label_824d0197-e023-4b4e-8031-4c7e86653643">
                      8 km
                    </div>
                  </div>
                  <img
                    class="path-6"
                    data-id="image_8a9f6259-fdf1-4e44-a366-a474e37bbb54"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--path-6-14101626-743C-47C0-8C78-A49D22DBD20E@2x.png"
                  />
                  <img
                    class="oval"
                    data-id="image_6d94e54f-c29d-4f5d-af71-0072d6f5e8ef"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--oval-5-D0AD09EC-BAB2-46E4-A6AB-47378990E97F@2x.png"
                  />
                </div>
                <div class="bubble-5 smart-layers-pointers hidden" data-id="View_411549b9-da9d-4d0e-809f-3a4efb6410a7">
                  <div class="overlap-group" data-id="an|XBatK5BT">
                    <div class="overlap-group" data-id="an|756gSDQn">
                      <div class="rectangle" data-id="View_c04b2037-d594-435a-bb46-c502b5b53e7f"></div>
                      <img
                        class="triangle"
                        data-id="image_0bb18f52-17f9-44c9-95aa-f9fced439066"
                        src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--triangle-4A30F927-8DCF-429E-95BF-0E960D703466@2x.png"
                      />
                    </div>
                    <div class="title-1 lato-normal-white-12px" data-id="Label_bd6b0646-9413-4108-8603-3b87e90d26bb">
                      20 km
                    </div>
                  </div>
                  <img
                    class="path-6-copy"
                    data-id="image_1ec79ed8-0ed4-421d-9a28-366ed840255e"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--path-6-copy-B0170DE9-761E-425B-B12B-BD0AF9061A99@2x.png"
                  />
                  <img
                    class="oval"
                    data-id="image_6d0039f5-c236-469b-b744-0d5e7f6f1cb5"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--oval-5-D0AD09EC-BAB2-46E4-A6AB-47378990E97F@2x.png"
                  />
                </div>
                <div class="bubble-4 smart-layers-pointers hidden" data-id="View_cc1b9c5f-830a-4101-8236-302ad7f73a46">
                  <div class="overlap-group" data-id="an|ktG2PlVO">
                    <div class="overlap-group" data-id="an|MtWX1U6x">
                      <div class="rectangle" data-id="View_c5b07b97-f7b3-4425-bdba-3edf22298774"></div>
                      <img
                        class="triangle"
                        data-id="image_b3c35f38-474c-4aa6-acc3-b19417bff3c0"
                        src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--triangle-4A30F927-8DCF-429E-95BF-0E960D703466@2x.png"
                      />
                    </div>
                    <div class="title-1 lato-normal-white-12px" data-id="Label_07e0d9bf-cda8-4e4f-b418-28ca26f8627d">
                      15 km
                    </div>
                  </div>
                  <img
                    class="path-6-copy-2"
                    data-id="image_0867453c-6b6d-4056-8312-4997775f5750"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--path-6-copy-2-1727640E-98AD-4840-A0C2-175941E4ECB2@2x.png"
                  />
                  <img
                    class="oval-1"
                    data-id="image_a258bdbc-80a0-4f9f-b39d-8551b0c36ddb"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--oval-5-D0AD09EC-BAB2-46E4-A6AB-47378990E97F@2x.png"
                  />
                </div>
                <div class="bubble-3 smart-layers-pointers hidden" data-id="View_e3853c7f-393f-4b4b-a4fc-38e19f753b74">
                  <div class="overlap-group" data-id="an|JKujw8Ys">
                    <div class="overlap-group" data-id="an|qsQsLIWn">
                      <div class="rectangle" data-id="View_8ac86cca-7bb1-478a-94ed-bdc45fab46c9"></div>
                      <img
                        class="triangle"
                        data-id="image_d9966878-ac4f-4e45-9207-77c5a2915398"
                        src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--triangle-4A30F927-8DCF-429E-95BF-0E960D703466@2x.png"
                      />
                    </div>
                    <div class="title-1 lato-normal-white-12px" data-id="Label_9d0d4ee1-eccd-4ff8-b3c0-a351991c7628">
                      10 km
                    </div>
                  </div>
                  <img
                    class="path-6-copy-3"
                    data-id="image_3ace2572-0ae0-413c-ad4f-82b544847fa3"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--path-6-14101626-743C-47C0-8C78-A49D22DBD20E@2x.png"
                  />
                  <img
                    class="oval-1"
                    data-id="image_988c99d7-6d73-484b-81d8-52972f56524b"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--oval-5-D0AD09EC-BAB2-46E4-A6AB-47378990E97F@2x.png"
                  />
                </div>
                <div class="bubble-2 smart-layers-pointers hidden" data-id="View_4c2b3b4d-e07a-4097-a260-6c077a3564ed">
                  <div class="overlap-group" data-id="an|usgOoKMz">
                    <div class="overlap-group" data-id="an|JZFIyst3">
                      <div class="rectangle" data-id="View_dd3a706f-39b7-49e6-9dbd-4e12dfdac82b"></div>
                      <img
                        class="triangle"
                        data-id="image_73ad0406-95b2-49a1-908f-daac7093a2d4"
                        src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--triangle-4A30F927-8DCF-429E-95BF-0E960D703466@2x.png"
                      />
                    </div>
                    <div class="title lato-normal-white-12px" data-id="Label_909ec7a3-db20-4c04-9430-e6d627ed5824">
                      5 km
                    </div>
                  </div>
                  <img
                    class="path-6-copy-4"
                    data-id="image_ac77cdb9-75b8-4156-aad7-aba12b72ff98"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--path-6-copy-4-5121C3CA-03DE-4623-ADBB-6B99BAAD2BF0@2x.png"
                  />
                  <img
                    class="oval"
                    data-id="image_97bd861c-8930-4f0f-9789-d469dc626c8c"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--oval-5-D0AD09EC-BAB2-46E4-A6AB-47378990E97F@2x.png"
                  />
                </div>
                <div class="bubble-1 smart-layers-pointers hidden" data-id="View_f47efc60-8f57-4111-b5d6-81a1d709af39">
                  <div class="overlap-group" data-id="an|VrzAzyU2">
                    <div class="overlap-group" data-id="an|7jKxLIUC">
                      <div class="rectangle" data-id="View_5a03111f-ebcd-4c5a-8530-8583f839dfc2"></div>
                      <img
                        class="triangle"
                        data-id="image_11d5ec52-0bf8-4fe2-86a6-fea90b264237"
                        src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--triangle-4A30F927-8DCF-429E-95BF-0E960D703466@2x.png"
                      />
                    </div>
                    <div class="title-1 lato-normal-white-12px" data-id="Label_99579ca1-ce21-457f-9674-03c8f33b7d36">
                      11 km
                    </div>
                  </div>
                  <img
                    class="path-6-copy-5"
                    data-id="image_4afad829-e0a4-4811-ad11-c6b6cec17380"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--path-6-copy-5-D5E5377A-7C6B-481B-B589-188A10956B8E@2x.png"
                  />
                  <img
                    class="oval-1-1"
                    data-id="image_5753ff64-7d1d-4123-a243-7ffc2348a7b4"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--oval-5-D0AD09EC-BAB2-46E4-A6AB-47378990E97F@2x.png"
                  />
                </div>
                <div class="bubble-6 smart-layers-pointers hidden" data-id="View_c3d87634-ba3f-4d2a-816f-cd20289a4037">
                  <div class="overlap-group2" data-id="an|62uedEpN">
                    <div class="overlap-group" data-id="an|CG362Yp7">
                      <div class="rectangle" data-id="View_ecc9b844-7fd1-44db-a774-dd4c9b892ecc"></div>
                      <img
                        class="triangle"
                        data-id="image_37f82224-50de-4089-b9e2-aff45cee40d4"
                        src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--triangle-4A30F927-8DCF-429E-95BF-0E960D703466@2x.png"
                      />
                    </div>
                    <div class="title-4 lato-normal-white-12px" data-id="Label_5ec98eb8-ac8e-4e8c-8a00-815e09c3825e">
                      15 km
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="weight-update-tab" data-id="View_8621319c-5c54-4a1c-842a-4e56f2af39c3">
              <div class="title-5 lato-normal-black-16px" data-id="Label_9450e75c-f7e8-40f9-b9c7-aab122d47be0">
                Weight update
              </div>
              <div class="gif" data-id="video_6f7f20c8-5678-492d-8a9c-0b43fd5ba730">
                <img
                  width="100%"
                  height="100%"
                  src="https://anima-uploads.s3.amazonaws.com/projects/602bd72d5ab477d8e2c77aae/files/weight-update-gif.gif"
                />
              </div>
            </div>
          </div>
        </div>
        <div class="my-profile-tab-desktop" data-id="View_87b45a8c-9da7-4da1-8976-587206622171">
          <div class="my-profile-card-desktop" data-id="View_7d275339-48b8-4b09-bc2a-31b5537fb607">
            <div class="title-6 castoro-regular-normal-black-16px" data-id="Label_b2f49147-3508-4146-8e5c-203fdae14014">
              My profile
            </div>
            <div class="my-profile" data-id="View_829ea2ef-f379-4a5d-b511-5e7825a1b0cc">
              <div class="overlap-group1-1" data-id="an|2TaixCZD">
                <img
                  class="profile-picture"
                  data-id="image_8def39c7-5efd-4b21-90cc-3db9d134b9e2"
                  src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/tablet-768---dashboard--profile-picture-08F86361-5EDB-44FA-AD01-0FF593E88CD9@2x.png"
                />
              </div>
              <div
                class="title-7 castoro-regular-normal-black-18px"
                data-id="Label_0b89ec3a-4b49-4cfe-bbb2-6b118f71d2ab"
              >
                Andrea Baker
              </div>
              <div class="hight-weight" data-id="View_c81f4af9-fd89-4869-afec-ec70e78b9803">
                <div class="hight" data-id="View_20f2e868-8410-4537-906b-b5aaed75d86d">
                  <div class="flex-row-2" data-id="an|GxD3u3y1">
                    <input
                      class="text-165 lato-normal-te-papa-green-23px"
                      data-id="Text_8fd99f40-ad0d-45c3-8fd3-1acdfcca217d"
                      name="text165"
                      placeholder="165"
                      type="text"
                      required
                    />
                    <div class="cm lato-normal-te-papa-green-12px" data-id="Label_077132e0-8c95-4d40-a6fd-b6df5fa58c7c">
                      cm
                    </div>
                  </div>
                  <img
                    class="path-2"
                    data-id="image_936dc562-56c3-4090-8965-0f64e02e171d"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/tablet-768---dashboard--path-2-420DC763-C214-4DBB-896E-1F3C3AD533E0@2x.png"
                  />
                </div>
                <div class="weight" data-id="View_96fc09b5-071c-4319-a821-9c75517ca2c0">
                  <div class="flex-row-3" data-id="an|DfbH2iJW">
                    <input
                      class="text-55 lato-normal-te-papa-green-23px"
                      data-id="Text_33b49f4d-9590-4d34-94f2-8ddfd1cb66de"
                      name="text55"
                      placeholder="55"
                      type="text"
                      required
                    />
                    <div class="kg lato-normal-te-papa-green-12px" data-id="Label_445a1008-fc4d-4029-93bf-a0dddf561852">
                      kg
                    </div>
                  </div>
                  <img
                    class="path-2-1"
                    data-id="image_7e4dd0e9-4125-490c-b9df-9e4d3c9296e4"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/tablet-768---dashboard--path-2-420DC763-C214-4DBB-896E-1F3C3AD533E0@2x.png"
                  />
                </div>
              </div>
            </div>
            <div class="recommended-trainers" data-id="View_a4f9c947-5298-4804-a3a1-cea206fa481f">
              <div class="flex-row-4" data-id="an|38Ycdfe1">
                <div
                  class="text-1 castoro-regular-normal-black-16px"
                  data-id="Label_2f1a3b21-5c26-4481-aa5f-feae47b859e4"
                >
                  Recommended trainers
                </div>
                <div class="overlap-group-3" data-id="an|gRSrFW4k">
                  <img
                    class="oval-3"
                    data-id="image_2a662284-dd70-4104-bcbc-2b3e2e8cd53f"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--oval-AE427E62-3EE7-430F-BA9E-EDA509341D0D@2x.png"
                  />
                  <img
                    class="path-1"
                    data-id="image_e2e38161-730d-42af-8279-3ef24f6a00c2"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--path-EDA2AF73-E812-43BE-A03C-9884DF9920EC@2x.png"
                  />
                </div>
              </div>
              <div class="trainer-1-desktop" data-id="View_d8903fd8-e40f-4667-aece-52d745143ae6">
                <div class="flex-row-1" data-id="an|c5TB7Xld">
                  <img
                    class="avatar-1"
                    data-id="image_f865e211-fc58-4e49-9cf3-47c487acf0f1"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/mobile-375---dashboard-avatar-1-9EC19DDF-1651-43CE-8AFA-0B7E1635D989@2x.png"
                  />
                  <div class="flex-col lato-normal-black-14px" data-id="an|0bdljiRo">
                    <div class="name" data-id="Label_24a03253-e7f2-4898-b872-cfc8a3fe39df">Jonathan Van Ness</div>
                    <div class="kickboxing" data-id="Label_4beb0588-cf8c-45a3-b4c1-05bbbddfa536">Kickboxing</div>
                  </div>
                </div>
                <div
                  class="emptycheckbox6 component component-wrapper not-ready"
                  data-id="View_d4e83413-b5b3-4352-9450-e89b05873bbf"
                >
                  <img
                    class="empty-checkbox-TLUca4"
                    data-id="image_949f4e7d-67c2-4428-a5ab-c84f8f4e3094"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--empty-checkbox-F4FA2DF1-96D5-405E-A716-B1F0EF341345@2x.png"
                  />
                  <img
                    class="fulltabcopy26 component component-wrapper not-ready hidden"
                    data-id="image_142e7063-0580-452a-bd1a-7f7713cdfcbd"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--full-checkbox-20DBE842-536C-4E23-A779-18B67A4630D1@2x.png"
                  />
                  <script defer>
                    document.querySelector(".fulltabcopy26.component-wrapper").timeline_data = [
                      {
                        initial_state_name: "state1",
                        root_element: ".fulltabcopy26",
                        states_flow: {
                          state1: {
                            listeners: [],
                            overrides: {},
                          },
                          state2: {
                            listeners: [],
                            overrides: {},
                          },
                        },
                      },
                    ];
                  </script>
                </div>
                <script defer>
                  document.querySelector(".emptycheckbox6.component-wrapper").timeline_data = [
                    {
                      initial_state_name: "state1",
                      root_element: ".emptycheckbox6",
                      states_flow: {
                        state1: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy26": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state2",
                              listener_type: "click",
                              target_selector: ".empty-checkbox-TLUca4",
                            },
                          ],
                          overrides: {},
                        },
                        state2: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy26": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state1",
                              listener_type: "click",
                              target_selector: ".fulltabcopy26",
                            },
                          ],
                          overrides: {
                            ".fulltabcopy26": {
                              opacity: 1,
                            },
                          },
                        },
                      },
                    },
                  ];
                </script>
              </div>
              <div class="trainer" data-id="View_198cd006-9369-430a-ae51-8fd9f9d967aa">
                <div class="flex-row-1" data-id="an|kOh0Xbx3">
                  <img
                    class="avatar-1"
                    data-id="image_49cee722-d206-4b5d-b218-1166c7c2f8a1"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/tablet-768---dashboard--avatar-2-B00594B1-B116-48A1-A8B7-F1CA558F1293@2x.png"
                  />
                  <div class="flex-col lato-normal-black-14px" data-id="an|txCypKRg">
                    <div class="jonathan-van-ness" data-id="Label_ca8f7925-14a9-45ea-bc98-01de4343c41f">
                      Gabrielle Union
                    </div>
                    <div class="kickboxing" data-id="Label_846705f6-3965-4026-9466-a585040ed9a3">Strength</div>
                  </div>
                </div>
                <div
                  class="emptycheckbox5 component component-wrapper not-ready"
                  data-id="View_1759c61f-11cf-4ca1-bc43-ca26a28e48c1"
                >
                  <img
                    class="empty-checkbox-A2skB2"
                    data-id="image_b2695ccb-ee73-486e-8e64-6777a056b771"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--empty-checkbox-F4FA2DF1-96D5-405E-A716-B1F0EF341345@2x.png"
                  />
                  <img
                    class="fulltabcopy25 component component-wrapper not-ready hidden"
                    data-id="image_70cd1299-ec3f-4c43-9375-e5cb56fa74bb"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--full-checkbox-20DBE842-536C-4E23-A779-18B67A4630D1@2x.png"
                  />
                  <script defer>
                    document.querySelector(".fulltabcopy25.component-wrapper").timeline_data = [
                      {
                        initial_state_name: "state1",
                        root_element: ".fulltabcopy25",
                        states_flow: {
                          state1: {
                            listeners: [],
                            overrides: {},
                          },
                          state2: {
                            listeners: [],
                            overrides: {},
                          },
                        },
                      },
                    ];
                  </script>
                </div>
                <script defer>
                  document.querySelector(".emptycheckbox5.component-wrapper").timeline_data = [
                    {
                      initial_state_name: "state1",
                      root_element: ".emptycheckbox5",
                      states_flow: {
                        state1: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy25": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state2",
                              listener_type: "click",
                              target_selector: ".empty-checkbox-A2skB2",
                            },
                          ],
                          overrides: {},
                        },
                        state2: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy25": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state1",
                              listener_type: "click",
                              target_selector: ".fulltabcopy25",
                            },
                          ],
                          overrides: {
                            ".fulltabcopy25": {
                              opacity: 1,
                            },
                          },
                        },
                      },
                    },
                  ];
                </script>
              </div>
              <div class="trainer" data-id="View_799fc4d0-6721-4c7f-af9a-5388ab1fb0e3">
                <div class="flex-row-1" data-id="an|hEc4RtY0">
                  <img
                    class="avatar-1"
                    data-id="image_066b72e1-8908-45b3-bc64-2d9fe53197f2"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/tablet-768---dashboard--avatar-3-C9D3A31C-6B1A-4CFD-B63C-5F36AB2D4336@2x.png"
                  />
                  <div class="flex-col lato-normal-black-14px" data-id="an|1X6bFf1c">
                    <div class="jonathan-van-ness-1" data-id="Label_adf69f39-5aa8-42d8-8bfe-86fa293925cd">
                      Phil Desforges
                    </div>
                    <div class="kickboxing" data-id="Label_310cbb40-6ab6-4100-a83f-f74a93f0e0b5">Hiit</div>
                  </div>
                </div>
                <div
                  class="emptycheckbox4 component component-wrapper not-ready"
                  data-id="View_7d5a8188-60e5-4dd3-bc6a-b869962ee944"
                >
                  <img
                    class="empty-checkbox-f5LoDy"
                    data-id="image_fa1ff6a6-1e0d-411c-821e-b41d4d2b9df0"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--empty-checkbox-F4FA2DF1-96D5-405E-A716-B1F0EF341345@2x.png"
                  />
                  <img
                    class="fulltabcopy24 component component-wrapper not-ready hidden"
                    data-id="image_1fe994a6-34cc-4e6e-9920-cf8c118f5ebf"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--full-checkbox-20DBE842-536C-4E23-A779-18B67A4630D1@2x.png"
                  />
                  <script defer>
                    document.querySelector(".fulltabcopy24.component-wrapper").timeline_data = [
                      {
                        initial_state_name: "state1",
                        root_element: ".fulltabcopy24",
                        states_flow: {
                          state1: {
                            listeners: [],
                            overrides: {},
                          },
                          state2: {
                            listeners: [],
                            overrides: {},
                          },
                        },
                      },
                    ];
                  </script>
                </div>
                <script defer>
                  document.querySelector(".emptycheckbox4.component-wrapper").timeline_data = [
                    {
                      initial_state_name: "state1",
                      root_element: ".emptycheckbox4",
                      states_flow: {
                        state1: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy24": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state2",
                              listener_type: "click",
                              target_selector: ".empty-checkbox-f5LoDy",
                            },
                          ],
                          overrides: {},
                        },
                        state2: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy24": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state1",
                              listener_type: "click",
                              target_selector: ".fulltabcopy24",
                            },
                          ],
                          overrides: {
                            ".fulltabcopy24": {
                              opacity: 1,
                            },
                          },
                        },
                      },
                    },
                  ];
                </script>
              </div>
              <div class="trainer" data-id="View_f8b05b36-c89a-4dd6-ba26-e7a9e4bc96b3">
                <div class="flex-row-1" data-id="an|9c7HRN7b">
                  <img
                    class="avatar-1"
                    data-id="image_33553a98-0c41-404c-9ec1-64e40d47a4f7"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/tablet-768---dashboard--avatar-4-EF4214AB-0B9B-496E-A8D1-E9C474A66626@2x.png"
                  />
                  <div class="flex-col lato-normal-black-14px" data-id="an|xWY9JPCJ">
                    <div class="jonathan-van-ness-2" data-id="Label_ad4aaf01-1953-4a69-a813-09e5888c86ca">Dan Edge</div>
                    <div class="kickboxing" data-id="Label_f15c19d8-6f19-49f1-8fbe-68f4518385f4">Running</div>
                  </div>
                </div>
                <div
                  class="emptycheckbox3 component component-wrapper not-ready"
                  data-id="View_c8103e28-f3e5-41f8-9635-44d3bd006d00"
                >
                  <img
                    class="empty-checkbox-8RXgxT"
                    data-id="image_2d5a8ffb-3d25-42f0-ae5a-bbe9932f1f94"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--empty-checkbox-F4FA2DF1-96D5-405E-A716-B1F0EF341345@2x.png"
                  />
                  <img
                    class="fulltabcopy23 component component-wrapper not-ready hidden"
                    data-id="image_70bf4c37-aae6-4109-a0cf-271128c8e8c8"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--full-checkbox-20DBE842-536C-4E23-A779-18B67A4630D1@2x.png"
                  />
                  <script defer>
                    document.querySelector(".fulltabcopy23.component-wrapper").timeline_data = [
                      {
                        initial_state_name: "state1",
                        root_element: ".fulltabcopy23",
                        states_flow: {
                          state1: {
                            listeners: [],
                            overrides: {},
                          },
                          state2: {
                            listeners: [],
                            overrides: {},
                          },
                        },
                      },
                    ];
                  </script>
                </div>
                <script defer>
                  document.querySelector(".emptycheckbox3.component-wrapper").timeline_data = [
                    {
                      initial_state_name: "state1",
                      root_element: ".emptycheckbox3",
                      states_flow: {
                        state1: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy23": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state2",
                              listener_type: "click",
                              target_selector: ".empty-checkbox-8RXgxT",
                            },
                          ],
                          overrides: {},
                        },
                        state2: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy23": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state1",
                              listener_type: "click",
                              target_selector: ".fulltabcopy23",
                            },
                          ],
                          overrides: {
                            ".fulltabcopy23": {
                              opacity: 1,
                            },
                          },
                        },
                      },
                    },
                  ];
                </script>
              </div>
              <div class="trainer" data-id="View_bd8a06d3-4d56-4fa4-a84f-47f4029691a4">
                <div class="flex-row-1" data-id="an|QjqJDWhl">
                  <img
                    class="avatar-1"
                    data-id="image_e27a8625-163f-4a6f-8e8c-89e9f0c1e616"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--avatar-1-AEEB32EA-A44E-4127-B275-C50F6A57FFE3@2x.png"
                  />
                  <div class="flex-col lato-normal-black-14px" data-id="an|pT11qIzL">
                    <div class="jonathan-van-ness-3" data-id="Label_483544f4-ed71-45cb-adcc-ebdd6007b657">
                      Cristina Gottardi
                    </div>
                    <div class="kickboxing" data-id="Label_7d59184c-0a21-460d-9b6d-eeec34803cbf">Pilates</div>
                  </div>
                </div>
                <div
                  class="emptycheckbox2 component component-wrapper not-ready"
                  data-id="View_88d5d3b7-2df8-49db-ab48-219c44deb8db"
                >
                  <img
                    class="empty-checkbox-UaWDXR"
                    data-id="image_91d828ba-f355-44c6-b01d-76c11d379b24"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--empty-checkbox-F4FA2DF1-96D5-405E-A716-B1F0EF341345@2x.png"
                  />
                  <img
                    class="fulltabcopy22 component component-wrapper not-ready hidden"
                    data-id="image_aa18bbe0-8910-4851-a399-8e2c4dc4ed07"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--full-checkbox-20DBE842-536C-4E23-A779-18B67A4630D1@2x.png"
                  />
                  <script defer>
                    document.querySelector(".fulltabcopy22.component-wrapper").timeline_data = [
                      {
                        initial_state_name: "state1",
                        root_element: ".fulltabcopy22",
                        states_flow: {
                          state1: {
                            listeners: [],
                            overrides: {},
                          },
                          state2: {
                            listeners: [],
                            overrides: {},
                          },
                        },
                      },
                    ];
                  </script>
                </div>
                <script defer>
                  document.querySelector(".emptycheckbox2.component-wrapper").timeline_data = [
                    {
                      initial_state_name: "state1",
                      root_element: ".emptycheckbox2",
                      states_flow: {
                        state1: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy22": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state2",
                              listener_type: "click",
                              target_selector: ".empty-checkbox-UaWDXR",
                            },
                          ],
                          overrides: {},
                        },
                        state2: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy22": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state1",
                              listener_type: "click",
                              target_selector: ".fulltabcopy22",
                            },
                          ],
                          overrides: {
                            ".fulltabcopy22": {
                              opacity: 1,
                            },
                          },
                        },
                      },
                    },
                  ];
                </script>
              </div>
              <div class="trainer" data-id="View_338bcc62-baaf-42cd-be8b-70a843e89e40">
                <div class="flex-row-1" data-id="an|AxAVvA6e">
                  <img
                    class="avatar-1"
                    data-id="image_a252f038-1e4d-41c8-9a94-8720d26b779e"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--avatar-1-AD4DF60C-944C-43EB-B164-323EC5CD39BE@2x.png"
                  />
                  <div class="flex-col lato-normal-black-14px" data-id="an|ezmEoYCM">
                    <div class="jonathan-van-ness-4" data-id="Label_b058dd70-8d2e-4036-81af-1bfc6cb6f96e">
                      Bianca Ackermann
                    </div>
                    <div class="kickboxing" data-id="Label_0c42b060-8172-489c-b07d-df8e387d5a1f">Yoga</div>
                  </div>
                </div>
                <div
                  class="emptycheckbox component component-wrapper not-ready"
                  data-id="View_bc6799d3-58ff-4381-a52a-a5e4dffde506"
                >
                  <img
                    class="empty-checkbox-mYx1iB"
                    data-id="image_0803efb7-9df1-474f-b125-d2581e1349e6"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--empty-checkbox-F4FA2DF1-96D5-405E-A716-B1F0EF341345@2x.png"
                  />
                  <img
                    class="fulltabcopy2 component component-wrapper not-ready hidden"
                    data-id="image_33647d51-ce87-4daa-b494-e4713c911fee"
                    src="https://anima-uploads.s3.amazonaws.com/projects/5ff580a06cbff7a8c507dde3/releases/5ff580f36cbff7a8c507dde4/img/desktop-1280---dashboard--full-checkbox-20DBE842-536C-4E23-A779-18B67A4630D1@2x.png"
                  />
                  <script defer>
                    document.querySelector(".fulltabcopy2.component-wrapper").timeline_data = [
                      {
                        initial_state_name: "state1",
                        root_element: ".fulltabcopy2",
                        states_flow: {
                          state1: {
                            listeners: [],
                            overrides: {},
                          },
                          state2: {
                            listeners: [],
                            overrides: {},
                          },
                        },
                      },
                    ];
                  </script>
                </div>
                <script defer>
                  document.querySelector(".emptycheckbox.component-wrapper").timeline_data = [
                    {
                      initial_state_name: "state1",
                      root_element: ".emptycheckbox",
                      states_flow: {
                        state1: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy2": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state2",
                              listener_type: "click",
                              target_selector: ".empty-checkbox-mYx1iB",
                            },
                          ],
                          overrides: {},
                        },
                        state2: {
                          listeners: [
                            {
                              animations: {
                                ".fulltabcopy2": {
                                  delay: 0,
                                  duration: 200,
                                  easing: "ease-in-out",
                                },
                              },
                              change_to_state: "state1",
                              listener_type: "click",
                              target_selector: ".fulltabcopy2",
                            },
                          ],
                          overrides: {
                            ".fulltabcopy2": {
                              opacity: 1,
                            },
                          },
                        },
                      },
                    },
                  ];
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://animaapp.s3.amazonaws.com/js/timeline.js"></script>
            </div>
      </div>
    </section>            
  
@endsection

@section('javascript')
<script type="text/javascript">


$(document).ready(function()
{
    $('.filter-results').change(function()
    {
        $('#courseList').submit();
    });
    $ ->
  $('[data-toggle]').on('click', ->
    toggle = $(this).addClass('active').attr('data-toggle')
    $(this).siblings('[data-toggle]').removeClass('active')
    $('.surveys').removeClass('grid list').addClass(toggle)
  )

   
});
</script>
@endsection