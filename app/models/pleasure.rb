class Pleasure < ApplicationRecord
  belongs_to :subcategory
  validates :name, presence: true,
                   length: { minimum: 4, maximum: 50}
  validates :description, presence: true,
  length: { minimum: 4, maximum: 250 }
  validates :user_id, presence: true
  validates_associated :subcategory
  # filter elements
  scope :by_subcategory, -> (subcategory_id) { where(subcategory_id: subcategory_id ) if subcategory_id.present? }
  scope :by_name, -> (name){where(["name LIKE :term", {:term => "%#{name}%"}]) if name.present?}
  scope :by_user, -> (user_id) { where(user_id: user_id) if user_id.present?}
  scope :by_category, -> (category_id) {
    joins(:subcategory).where(:subcategories => {category_id: category_id}) if category_id.present?
  }
end
