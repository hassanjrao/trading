tables:

asset_types: id, name

account_sizes: id, size

steps: id, step

extra_filters: id, filter

technologies: id, name



firms: id, name, url, established_date, asset_type_id,



firm_challenge_attributes: id, firm_id, profit_split, technology_id, direct_path_to_live_funded, payout_frequency, payout_frequency_note, daily_drawdown, account_size_id, step_id, rewards

firm_challenge_listings: id, firm_id, actual_price,actual_price_note, before_price , account_size_id, profit_target, max_daily_loss,max_daily_loss_note, max_total_drawdown, profit_split, activation_fee, reward



firm_abouts: id, firm_id, cheif_executive_officer, trust_pilot, more_than_5_platforms (boolean), commission_strucuture_link, description

firm_payment_methods: id, firm_id, image_path, name

firm_payout_methods: id, firm_id, image_path, name

firm_about_platforms: id, firm_about_id, icon, name, note

firm_about_commission_structures: id, firm_about_id, name, icon, points(json)



firm_reviews: id, firm_id, created_by, review, main_advantages, main_drawbacks





users: id, name, email, country, password, trading_experience, propfirm_challenge
