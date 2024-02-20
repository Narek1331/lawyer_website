<template>
  <div class="bg-gray-100 min-h-screen">
   
  <div :style="{ 'background-image': 'url(' + imagePath + ')' }" class="home-bg bg-cover min-h-screen flex flex-col justify-center items-center text-white">
    <h1 class="text-4xl font-bold mb-6 text-center">Բարի գալուստ Մեր իրավաբանական ընկերություն</h1>
    <p class="text-lg text-center">
      Բարի գալուստ [Firm Name], որտեղ իրավական փորձաքննությունը հանդիպում է անսասան նվիրվածության: Գերազանցության խորը հավատարմությամբ և հարուստ փորձով մենք կանգնած ենք որպես վստահության և հուսալիության փարոս իրավական ոլորտում: Մեր ընկերությունը բաղկացած է փորձառու փաստաբանների թիմից, որոնցից յուրաքանչյուրը հագեցած է անզուգական հմտություններով և արդարադատության կիրքով:
    </p>
    <router-link to="/services" class="bg-white text-blue-500 font-semibold py-2 px-6 rounded-full mt-8 inline-block hover:bg-blue-400 hover:text-white">Մեր ծառայությունները</router-link>
  </div>
  <!-- <section class="container mx-auto py-16 px-4">
      <h2 class="text-2xl font-semibold mb-8">Ինչու՞ ընտրել մեզ</h2>
      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-2 gap-4">
        
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">
            Փորձ, որին կարող եք վստահել
          </h3>
          <p>
            Տասնամյակների հավաքական փորձով մեր փորձառու փաստաբանների թիմը հարուստ գիտելիքներ և փորձառություն է բերում յուրաքանչյուր գործին: Բարդ կորպորատիվ խնդիրներից մինչև անձնական վնասվածքների պահանջներ, հաջողության մեր փորձն ինքնին խոսում է:
          </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">
            Անհատականացված ուշադրություն, ապացուցված արդյունքներ
          </h3>
          <p>
            Մենք հասկանում ենք, որ յուրաքանչյուր հաճախորդի իրավիճակը եզակի է: Այդ իսկ պատճառով մենք տրամադրում ենք անհատականացված ուշադրություն և հարմարեցված ռազմավարություններ՝ ձեր հատուկ կարիքներն ու նպատակները բավարարելու համար: Բարենպաստ արդյունքների հասնելու մեր հանձնառությունը մեզ վաստակել է անթիվ հաճախորդների վստահությունն ու գոհունակությունը:
          </p>
        </div>

      </div>
    </section> -->
  <br>
  <div class="container mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-8">Մեր Հաճախորդները</h2>
  </div>
  <div class="flex justify-center items-center h-full px-4">
  <div class="relative slide">
    <div class="carousel-indicators absolute bottom-0 flex h-24 w-full justify-center items-center"></div>
    <div class="carousel-inner relative overflow-hidden w-full">
      <div v-for="(review, index) in reviews" :key="index"
        :class="`${active === index ? 'active' : 'left-full'}`"
        class="carousel-item inset-0 relative w-full transform transition-all duration-500 ease-in-out">
        <div class="p-4 bg-white rounded-lg ">
          <h3 class="text-lg font-semibold">{{ review.username }}</h3>
          <div class="flex items-center mt-2">
            <template v-for="star in 5">
              <svg v-if="star <= review.stars" class="h-5 w-5 fill-current text-yellow-500"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M10 14.621l-5.539 3.169a1 1 0 01-1.555-1.054l1.062-6.564L.387 7.21a1 1 0 01.568-1.706l6.595-.954L9.65.829a1 1 0 011.701 0l2.95 4.721 6.595.954a1 1 0 01.568 1.706l-4.88 4.747 1.062 6.564a1 1 0 01-1.554 1.054L10 14.621z"
                  clip-rule="evenodd" />
              </svg>
              <svg v-else class="h-5 w-5 fill-current text-gray-300" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M10 14.621l-5.539 3.169a1 1 0 01-1.555-1.054l1.062-6.564L.387 7.21a1 1 0 01.568-1.706l6.595-.954L9.65.829a1 1 0 011.701 0l2.95 4.721 6.595.954a1 1 0 01.568 1.706l-4.88 4.747 1.062 6.564a1 1 0 01-1.554 1.054L10 14.621z"
                  clip-rule="evenodd" />
              </svg>
            </template>
          </div>
          <p class="mt-2">{{ review.text }}</p>
        </div>
      </div>
    </div>
  </div>
</div>

    <section class="container mx-auto py-16 px-4">
      <h2 class="text-2xl font-semibold mb-8">Ինչու՞ ընտրել մեզ</h2>
      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-8">
        
        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">
            Փորձ, որին կարող եք վստահել
          </h3>
          <p>
            Տասնամյակների հավաքական փորձով մեր փորձառու փաստաբանների թիմը հարուստ գիտելիքներ և փորձառություն է բերում յուրաքանչյուր գործին: Բարդ կորպորատիվ խնդիրներից մինչև անձնական վնասվածքների պահանջներ, հաջողության մեր փորձն ինքնին խոսում է:
          </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">
            Անհատականացված ուշադրություն
          </h3>
          <p>
            Մենք հասկանում ենք, որ յուրաքանչյուր հաճախորդի իրավիճակը եզակի է: Այդ իսկ պատճառով մենք տրամադրում ենք անհատականացված ուշադրություն և հարմարեցված ռազմավարություններ՝ ձեր հատուկ կարիքներն ու նպատակները բավարարելու համար: Բարենպաստ արդյունքների հասնելու մեր հանձնառությունը մեզ վաստակել է անթիվ հաճախորդների վստահությունն ու գոհունակությունը:
          </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
          <h3 class="text-xl font-semibold mb-4">
            Հաճախորդակենտրոն մոտեցում
          </h3>
          <p>
            Մեր ընկերությունում ձեր գոհունակությունն ու հաջողությունը մեր առաջնահերթությունն են: Մենք առաջնահերթություն ենք տալիս բաց հաղորդակցությանը, թափանցիկությանը և ամբողջականությանը մեր բոլոր փոխգործակցության մեջ: Մեզ հետ դուք կարող եք ակնկալել նվիրված շահերի պաշտպանություն և անսասան աջակցություն ամեն քայլափոխի:
          </p>
        </div>
      </div>
    </section>

    <section class="container mx-auto py-5 px-4">
      <h2 class="text-2xl font-semibold mb-8">Մեր նպատակը</h2>
      <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-1">
        
        <div class="bg-white p-6 rounded-lg shadow-md">
          <!-- <h3 class="text-xl font-semibold mb-4">
            Փորձ, որին կարող եք վստահել
          </h3> -->
          <p>
            Մեր նպատակն է մատուցել բարձրակարգ իրավաբանական ծառայություններ ինչպես անհատներին, այնպես էլ բիզնեսներին՝ ապահովելով արդարադատության և փորձագիտական ներկայացուցչության հասանելիությունը բոլորի համար: Մենք ձգտում ենք վստահելի գործընկեր լինել մեր հաճախորդների համար՝ առաջարկելով համապարփակ իրավական լուծումներ՝ հարմարեցված նրանց հատուկ կարիքներին: Մեր առաքելությունն է պահպանել պրոֆեսիոնալիզմի, ազնվության և հաճախորդների գոհունակության ամենաբարձր չափանիշները՝ միաժամանակ դրականորեն նպաստելով Հայաստանում իրավական դաշտին: Գերազանցությանը նվիրվածության և մեր հաճախորդներին ջանասիրությամբ և փորձառությամբ ծառայելու հանձնառության շնորհիվ մենք նպատակ ունենք դառնալ առաջատար իրավաբանական ընկերություն Հայաստանում՝ ճանաչված մեր բացառիկ իրավաբանական ծառայությունների և մեր հաճախորդների համար լավագույն արդյունքների հասնելու անսասան նվիրվածության համար:
          </p>
        </div>

      </div>
    </section>

  </div>
  
</template>

<script>
export default {
  name: 'HomePage',
  data() {
      return {
        imagePath: null,
        reviews: [
        { username: "Նարինե Կարապետյան", stars: 5, text: "Նրանք արդյունավետ հաղորդակցվեցին, ինձ տեղեկացված պահեցին ամեն քայլափոխի և տրամադրեցին հստակ ուղեցույց, որն օգնեց ինձ կողմնորոշվել բարդ իրավական հարցերում:" },
        { username: "Նաիրի Աբրահամյան", stars: 5, text: "Նրանց փորձը, պրոֆեսիոնալիզմը և նվիրվածությունն ակնհայտ էին ողջ դատական գործընթացի ընթացքում:" },
        { username: "Գարիկ Արարատյան", stars: 5, text: "Նրանց նվիրվածությունը, փորձը և մանրուքներին ուշադրությունը իսկապես առանձնացնում էին նրանց: Իմ գործի ընթացքում նրանք մնացին նախաձեռնող, արձագանքող և միշտ իմ լավագույն շահերի սրտում:" },
        { username: "Հայկ Սարգսյան", stars: 5, text: "Ես խորհուրդ եմ տալիս բոլորին, ովքեր փնտրում են իրավական ներկայացուցչություն:" },
        { username: "Լիլիթ Գրիգորյան", stars: 5, text: "Նրանց փորձն ու նվիրվածությունը վառ փայլեցին իմ իրավական հարցի բոլոր առումներով: Նախնական խորհրդակցությունից մինչև վերջնական լուծում, նրանք նրբագեղությամբ և հստակությամբ շրջեցին բարդությունները:" },
        { username: "Սեդա Մելքոնյան", stars: 5, text: "Նրանց նվիրվածությունը, փորձը և մանրուքներին ուշադրություն դարձրեցին ի սկզբանե: և տրամադրեց անգնահատելի խորհրդատվություն: Ես բարձր խորհուրդ եմ տալիս նրանց ծառայությունները բոլորին, ովքեր իրավական առաջնորդության կարիք ունեն:" },
        { username: "Սոսի Մարտիրոսյան", stars: 5, text: "Նախնական խորհրդակցությունից մինչև վերջնական լուծումը նրանք դրսևորեցին պրոֆեսիոնալիզմ և հստակություն, համոզվելով, որ ես հասկանում եմ յուրաքանչյուր քայլ:" },
        { username: "Արա Աբաղյան", stars: 5, text: "Եթե իրավական օգնության կարիք ունեք, մի հապաղեք դիմել: Շնորհակալություն ձեր բացառիկ ծառայության համար:" },
      ],
      active: 0
      };
    },
  async mounted(){
    this.imagePath = await this.getImagePath('image4.jpg');
    let i = 0;
    setInterval(() => {
      if (i > this.reviews.length - 1) {
        i = 0;
      }
      this.active = i;
      i++;
    }, 3000);
  
  }
}
</script>
<style scoped>
.left-full {
  left: -100%;
}

.carousel-item {
  float: left;
  position: relative;
  display: block;
  width: 100%;
  margin-right: -100%;
  backface-visibility: hidden;
}

.carousel-item.active {
  left: 0;
}
</style>
