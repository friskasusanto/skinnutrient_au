<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Product;
use App\Payment;
use App\Category;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
		$adminRole->name = "Admin";
		$adminRole->display_name = "Admin";
		$adminRole->save();

		// Membuat role member
		$dropshiperRole = new Role();
		$dropshiperRole->name = "Dropshiper";
		$dropshiperRole->display_name = "Dropshiper";
		$dropshiperRole->save();

		$memberRole = new Role();
		$memberRole->name = "Member";
		$memberRole->display_name = "Member";
		$memberRole->save();

		$resellerRole = new Role();
		$resellerRole->name = "Reseller";
		$resellerRole->display_name = "Reseller";
		$resellerRole->save();

		// Membuat sample admin
		$admin = new User();
		$admin->name = 'Admin Larapus';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('rahasia');
		$admin->save();
		$admin->attachRole($adminRole);
		
		// Membuat sample member
		$dropship = new User();
		$dropship->name = "Dropshiper";
		$dropship->email = 'dropshiper@gmail.com';
		$dropship->password = bcrypt('rahasia');
		$dropship->save();
		$dropship->attachRole($dropshiperRole);

		$member = new User();
		$member->name = "Sample Member";
		$member->email = 'member@gmail.com';
		$member->password = bcrypt('rahasia');
		$member->save();
		$member->attachRole($memberRole);

		$reseller = new User();
		$reseller->name = "Reseller";
		$reseller->email = 'reseller@gmail.com';
		$reseller->password = bcrypt('rahasia');
		$reseller->save();
		$reseller->attachRole($resellerRole);

		$payment = new Payment();
		$payment->name = "Mandiri";
		$payment->save();

		$payment = new Payment();
		$payment->name = "BNI";
		$payment->save();

		$category = new Category();
		$category->category_name = "Crystal White Series";
		$category->save();

		$category = new Category();
		$category->category_name = "Face Mask Series";
		$category->save();

		$category = new Category();
		$category->category_name = "Hyaluronic Series";
		$category->save();

		$category = new Category();
		$category->category_name = "Specific Care Series";
		$category->save();

		$category = new Category();
		$category->category_name = "PPY";
		$category->save();

		$category = new Category();
		$category->category_name = "Others";
		$category->save();

		//PRODUCT
		$product = new Product();
		$product->name = "EAORON BLACK KAVIAR CREAM";
		$product->category_id = "1";
		$product->price = "40";
		$product->image = "dafault.jpg";
		$product->description = "Specially formulated with black caviar extract, micro molecular gold, black pearl, amino acids and ocean minerals to help minimise dark spots, pigmentation and shrink pores, while nourishing and re-hydrating the skin. EAORON BLACK KAVIAR CREAM will help tightening, lifting and firming the skin.";
		$product->stock = "100";
		$product->max_price = "38";
		$product->min_price = "30";
		$product->slug = Str::slug('EAORON BLACK KAVIAR CREAM', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON Crystal White Moisturiser +SPF15";
		$product->category_id = "1";
		$product->price = "40";
		$product->image = "dafault.jpg";
		$product->description = "Designed to whiten the skin providing SPF protection. It provides immediate whitening and long lasting hydration, renewing and protecting the skin against sun and UV factors. Your skin will be instantly nourished, supple and hydrated through the day";
		$product->stock = "100";
		$product->max_price = "38";
		$product->min_price = "30";
		$product->slug = Str::slug('EAORON Crystal White Moisturiser +SPF15', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON Oxygen Bubble Face Mask";
		$product->category_id = "2";
		$product->price = "30";
		$product->image = "dafault.jpg";
		$product->description = "This Oxygen Bubble Face Mask has a highly effective double cleanser and deep absorption impurities benefits and might help nourish the skin providing a clearer skin. This newly “vacuum cleansing effect” mask, made with rich and delicate bubbles, that will clean away oil and dirt while and deeply absorb impurities from the bottom of the skin allowing it to breath freely. The mask fabric contains fine molecules, highly absorbent, allowing the skin to breathe while purifying pores";
		$product->stock = "100";
		$product->max_price = "28";
		$product->min_price = "20";
		$product->slug = Str::slug('EAORON Oxygen Bubble Face Mask', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON Jacaranda Miracle Mask";
		$product->category_id = "2";
		$product->price = "30";
		$product->image = "dafault.jpg";
		$product->description = "EAORON JACARANDA MIRACLE MASK has been specifically formulated for sensitive skin including witch hazel, chamomile extract and Australian Jacaranda Extract, known as an effective skin anti-oxidant and anti-inflammatory. It contains an advanced formulation to soothe the skin and assist with: oil balance, dehydration and redness(prone effects).";
		$product->stock = "100";
		$product->max_price = "28";
		$product->min_price = "20";
		$product->slug = Str::slug('EAORON Jacaranda Miracle Mask', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON Hyaluronic Acid Collagen Essence V 10ml";
		$product->category_id = "3";
		$product->price = "35";
		$product->image = "dafault.jpg";
		$product->description = "EAORON Hyaluronic Acid Collagen Essence V benefits from the powers of Hyaluronic Acid, CoEnzyme Q10 and Peptides which help to reinforce the skin, regulate hydration and protect the skin from external factors. This supreme essence combines the natural ingredients of botanical oils and plant extracts for youthful, healthier looking skin. The renewing properties of Peptides, anti-aging powers of Hyaluronic Acid and CoEnzyme Q10 help moisturize and soften fine lines. The upgraded formula of Hyaluronic Acid Collagen Essence contains trademarked ingredients Maritech® Bright and Pentavitin®, as well as Dragons Blood extract, which will effectively help with skin hydration, brightening and wrinkle reduction.";
		$product->stock = "100";
		$product->max_price = "33";
		$product->min_price = "25";
		$product->slug = Str::slug('EAORON Hyaluronic Acid Collagen Essence V 10ml', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON Hyaluronic Toner";
		$product->category_id = "3";
		$product->price = "29";
		$product->image = "dafault.jpg";
		$product->description = "Suitable for all types, especially those with rough and dry skin, the EAORON Hyaluronic Toner has an aqua light texture and is gentle on the skin. It contains natural moisturising factors and organic botanic compounds which deeply hydrate and gently repair the skin, as well as reinforcing the skin’s protective barrier. Through its gentle hydrating formula, it revitalizes the skin and provides an intensive aqua sensation to soothe the skin and restore its youthful brightness.";
		$product->stock = "100";
		$product->max_price = "27";
		$product->min_price = "19";
		$product->slug = Str::slug('EAORON Hyaluronic Toner', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON CERAMIDE SERUM SPRAY";
		$product->category_id = "4";
		$product->price = "30";
		$product->image = "dafault.jpg";
		$product->description = "Highly effective hydrating and repairing treatment made with Antarctic glacier water, formulated with South Pacific Ocean trench algae, ceramide, Bulgaria rose extract, squalene, nicotinamide, hyaluronic acid and botanical ingredients. This product is rapidly absorbed into the skin, purifying and hydrating pores. Resulting in a clearer, brighter and healthier looking skin.";
		$product->stock = "100";
		$product->max_price = "20";
		$product->min_price = "28";
		$product->slug = Str::slug('EAORON CERAMIDE SERUM SPRAY', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON SLIM SHAPES ANTI CELLULITE CREAM";
		$product->category_id = "4";
		$product->price = "60";
		$product->image = "dafault.jpg";
		$product->description = "Slim shapes anti cellulite cream contains an efficient fat burning formula comprised of natural ingredients.It helps fight cellulite through burning fat stored under the epidermis levels via sweating, which helps reducing stored water levels along the process. The advantages of using aesculus hippocastanum cladosiphon okamuranus, paulliania cupana and fatty alcohols for the skin have been tested lengthily and the results are associated with fat burning and a skin tightening and thus reshaping your body Used for a longer time period will help you tone your abdomen, waist, and thighs through reducing the fat in those areas with no side effects. The formula begins working immediately and results can be seen and felt after used.";
		$product->stock = "100";
		$product->max_price = "50";
		$product->min_price = "58";
		$product->slug = Str::slug('EAORON SLIM SHAPES ANTI CELLULITE CREAM', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON Glycation Reverse Capsules";
		$product->category_id = "5";
		$product->price = "60";
		$product->image = "dafault.jpg";
		$product->description = "This combination of extracts helps delay the signs of aging, preventing skin damage made by Glycation, reducing wrinkles and restoring elasticity, helping reverse the skin to a younger state.";
		$product->stock = "100";
		$product->max_price = "50";
		$product->min_price = "58";
		$product->slug = Str::slug('EAORON Glycation Reverse Capsules', '-');
		$product->save();

		$product = new Product();
		$product->name = "EAORON Exfoliating Cream";
		$product->category_id = "5";
		$product->price = "29";
		$product->image = "dafault.jpg";
		$product->description = "This smooth exfoliating cream cleans, softens and hydrates the skin, leaving a purer and smoother effect. This product contains nano grade gold powder and smooth botanical ingredients to provide hydra-soothing and silky skin feeling. It helps exfoliate dead skin, cleaning up skin pores, in order to refresh and help absorb skincare better. It contains moisturising ingredients and multiple herbal extracts to provide the skin with a natural sensation.";
		$product->stock = "100";
		$product->max_price = "19";
		$product->min_price = "27";
		$product->slug = Str::slug('EAORON Exfoliating Cream', '-');
		$product->save();
    }
}
